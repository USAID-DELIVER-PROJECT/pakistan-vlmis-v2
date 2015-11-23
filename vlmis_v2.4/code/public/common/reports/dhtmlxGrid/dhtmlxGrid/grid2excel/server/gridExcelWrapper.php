<?php

error_reporting(0);

require_once './lib/PHPExcel.php';
require_once './lib/PHPExcel/IOFactory.php';

class gridExcelWrapper {
    private $currentRow = 1;
	private $columns;

    public function createXLS($headerFileName, $headerLinesNum, $creator, $lastModifiedBy, $title, $subject, $dsc, $keywords, $category) {
		if ($headerFileName) {
			$this->excel = PHPExcel_IOFactory::load($headerFileName);
		} else {
			$this->excel = new PHPExcel();
		}

		$this->headerLinesNum = $headerLinesNum;
		$this->currentRow += $this->headerLinesNum;
        $this->excel->getProperties()->setCreator($creator)
                ->setLastModifiedBy($lastModifiedBy)
                ->setTitle($title)
                ->setSubject($subject)
                ->setDescription($dsc)
                ->setKeywords($keywords)
                ->setCategory($category);
    }

    public function headerPrint($columns, $summaryWidth, $headerHeight, $textColor, $headerColor, $lineColor, $headerFontSize, $fontFamily) {
		$this->textColor = $textColor;
		$this->columns = $columns;
		$this->types = Array();
        for ($i = 0; $i < count($columns); $i++) {
			$this->excel->getActiveSheet()->getRowDimension($this->currentRow)->setRowHeight($headerHeight);
			for ($j = 0; $j < count($columns[$i]); $j++) {
				$this->excel->setActiveSheetIndex(0);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow($j, $this->currentRow, $columns[$i][$j]['text']);
				$this->excel->getActiveSheet()->getColumnDimension($this->getColName($j))->setWidth(($columns[0][$j]['width']*180)/$summaryWidth);
				$this->excel->getActiveSheet()->getStyle($this->getColName($j).$this->currentRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$this->excel->getActiveSheet()->getStyle($this->getColName($j).$this->currentRow)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$this->excel->getActiveSheet()->getStyle($this->getColName($j).$this->currentRow)->getFont()->getColor()->setRGB($textColor);
				if (($i == 0)&&(isset($columns[0][$j]))) {
					$this->types[$j] = $columns[0][$j]['excel_type'];
				}
			}
			$this->currentRow++;
        }
		for ($i = 0; $i < count($columns); $i++) {
			for ($j = 0; $j < count($columns[$i]); $j++) {
				if (isset($columns[$i][$j]['colspan'])) {
					$this->excel->getActiveSheet()->mergeCells($this->getColName($j).($this->headerLinesNum + $i + 1).':'.$this->getColName($j + $this->columns[$i][$j]['colspan'] - 1).($this->headerLinesNum + $i + 1));
				}
				if (isset($columns[$i][$j]['rowspan'])) {
					$this->excel->getActiveSheet()->mergeCells($this->getColName($j).($this->headerLinesNum + $i + 1).':'.$this->getColName($j).($this->headerLinesNum + $i + $this->columns[$i][$j]['rowspan']));
				}
			}
		}
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => $this->processColor($lineColor)),
                ),
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'rotation' => 90,
                'startcolor' => array(
                    'argb' => $this->processColor($headerColor)
                )
            ),
			'font' => array(
				'bold' => true,
				'name' => $fontFamily,
				'size' => $headerFontSize
			)
        );
        $this->excel->getActiveSheet()->getStyle(($this->getColName(0).($this->headerLinesNum + 1).':'.$this->getColName(count($columns[0]) - 1).($this->headerLinesNum + $this->currentRow - 1)))->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->freezePane("A".($this->headerLinesNum + count($columns) + 1));
		$this->excel->getActiveSheet()->setBreak( 'H4' , PHPExcel_Worksheet::BREAK_ROW );
    }


    public function rowPrint($row, $cellColors, $rowHeight, $lineColor, $gridFontSize, $fontFamily) {
        $this->excel->getActiveSheet()->getRowDimension($this->currentRow)->setRowHeight($rowHeight);
		$styleArray = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => $this->processColor($lineColor)),
				),
			),
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'rotation' => 90
			),
			'font' => array(
				'bold' => false,
				'name' => $fontFamily,
				'size' => $gridFontSize,
				'color'=> Array('rgb'=> $this->processColor($this->textColor))
			)
		);
		$this->excel->getActiveSheet()->getStyle(($this->getColName(0).$this->currentRow.':'.$this->getColName(count($row) - 1).$this->currentRow))->applyFromArray($styleArray);

        for ($i = 0; $i < count($row); $i++) {
            $this->excel->setActiveSheetIndex(0);
			$text = $row[$i];
			if ((isset($this->columns[0][$i]['type']))&&(($this->columns[0][$i]['type'] == 'ch')||($this->columns[0][$i]['type'] == 'ra'))) {
				if ($text == '1') {
					$text = 'Yes';
				} else {
					$text = 'No';
				}
			}

			switch (strtolower($this->types[$i])) {
				case 'string':
				case 'str':
					$this->excel->getActiveSheet()->getCell($this->getColName($i).$this->currentRow)->setValueExplicit($text, PHPExcel_Cell_DataType::TYPE_STRING);
					break;
				case 'number':
				case 'num':
					$this->excel->getActiveSheet()->getCell($this->getColName($i).$this->currentRow)->setValueExplicit($text, PHPExcel_Cell_DataType::TYPE_NUMERIC);
					break;
				case 'boolean':
				case 'bool':
					$this->excel->getActiveSheet()->getCell($this->getColName($i).$this->currentRow)->setValueExplicit($text, PHPExcel_Cell_DataType::TYPE_BOOL);
					break;
				case 'formula':
					$this->excel->getActiveSheet()->getCell($this->getColName($i).$this->currentRow)->setValueExplicit($text, PHPExcel_Cell_DataType::TYPE_FORMULA);
					break;
				case 'date':
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $this->currentRow, $text);
					$this->excel->getActiveSheet()->getStyle($this->getColName($i).$this->currentRow)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
					break;
				default:
					$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $this->currentRow, $text);
					break;
			}
			$this->excel->getActiveSheet()->getStyle($this->getColName($i).$this->currentRow)->getFill()->getStartColor()->setRGB($this->getRGB($cellColors[$i]['bg']));
			$this->excel->getActiveSheet()->getStyle($this->getColName($i).$this->currentRow)->getFont()->getColor()->setRGB($this->getRGB($cellColors[$i]['text']));
        }

		$this->currentRow++;
	}


	public function footerPrint($columns, $headerHeight, $textColor, $headerColor, $lineColor, $headerFontSize, $fontFamily) {
		$this->footerColumns = $columns;
		if (count($columns) == 0)
			return false;
        for ($i = 0; $i < count($columns); $i++) {
			$this->excel->getActiveSheet()->getRowDimension($this->currentRow)->setRowHeight($headerHeight);
			for ($j = 0; $j < count($columns[$i]); $j++) {
				$this->excel->setActiveSheetIndex(0);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow($j, $this->currentRow, $columns[$i][$j]['text']);
				$this->excel->getActiveSheet()->getStyle($this->getColName($j).$this->currentRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$this->excel->getActiveSheet()->getStyle($this->getColName($j).$this->currentRow)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$this->excel->getActiveSheet()->getStyle($this->getColName($j).$this->currentRow)->getFont()->getColor()->setRGB($textColor);
			}
			$this->currentRow++;
        }
		$cr = $this->currentRow - count($columns);
		for ($i = 0; $i < count($columns); $i++) {
			for ($j = 0; $j < count($columns[$i]); $j++) {
				if (isset($columns[$i][$j]['colspan'])) {
					$this->excel->getActiveSheet()->mergeCells($this->getColName($j).($cr + $i).':'.$this->getColName($j + $columns[$i][$j]['colspan'] - 1).($cr + $i));
				}
				if (isset($columns[$i][$j]['rowspan'])) {
					$this->excel->getActiveSheet()->mergeCells($this->getColName($j).($cr + $i).':'.$this->getColName($j).($cr + $i - 1 + $columns[$i][$j]['rowspan']));
				}
			}
		}
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => $this->processColor($lineColor)),
                ),
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'rotation' => 90,
                'startcolor' => array(
                    'argb' => $this->processColor($headerColor)
                )
            ),
			'font' => array(
				'bold' => true,
				'name' => $fontFamily,
				'size' => $headerFontSize
			)
        );
		$this->excel->getActiveSheet()->getStyle(($this->getColName(0).($this->currentRow - count($columns)).':'.$this->getColName(count($columns[0]) - 1).($this->currentRow - 1)))->applyFromArray($styleArray);
	}


	public function outXLS($title) {
		$this->excel->getActiveSheet()->setTitle($title);
		$this->excel->setActiveSheetIndex(0);

		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.'report_'.date("Y_m_d__H_i_s").'.xls"');
		header('Cache-Control: max-age=0');
		
		$objWriter->save('php://output'); 
	}


	public function headerDraw($img) {

	}


	public function footerDraw($img) {

	}


	private function getColName($i) {
		if ($i < 26) {
			$result = chr($i + 65);
		} else {
			$a = 0;
			while ($i > 25) {
				$i -= 25;
				$a++;
			}

			if ($i >= $a) {
				$i++;
			}

			$result = chr($a + 64).chr($i + 64);
		}
		return $result;
	}


    private function processColor($color) {
		$color = $this->processColorForm($color);
//        if (!preg_match('/[0-9A-F]{6}/i', $color)) {
//            return false;
//        } else {
		if ($color != 'transparent') {
			return "FF".strToUpper($color);
		} else {
			return false;
		}
            
//        }
    }


	private function processColorForm($color) {
		if ($color == 'transparent') {
			return $color;
		}

		if (preg_match("/#[0-9A-Fa-f]{6}/", $color)) {
			return substr($color, 1);
		}
		if (preg_match("/[0-9A-Fa-f]{6}/", $color)) {
			return $color;
		}
		$color = trim($color);
		$result = preg_match_all("/rgb\s?\(\s?(\d{1,3})\s?,\s?(\d{1,3})\s?,\s?(\d{1,3})\s?\)/", $color, $rgb);

		if ($result) {
			$color = '';
			for ($i = 1; $i <= 3; $i++) {
				$comp = dechex($rgb[$i][0]);
				if (strlen($comp) == 1) {
					$comp = '0'.$comp;
					}
				$color .= $comp;
			}
			return $color;
		} else {
			return 'transparent';
		}
	}

	private function getRGB($color) {
		$color = $this->processColorForm($color);
		if ($color == 'transparent') {
			return false;
		} else {
			return $color;
		}
	}
}

?>