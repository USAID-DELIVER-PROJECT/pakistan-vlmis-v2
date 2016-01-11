<?php

class Zend_View_Helper_Docs extends Zend_View_Helper_Abstract {

    public function docs() {
        return $this;
    }

    public function getDocSubCategories($category_id) {

        $querypro = "SELECT
                        document_categories.category_title,
                        document_categories.pk_id
                    FROM
                        document_categories
                        INNER JOIN document_categories AS main ON main.pk_id = document_categories.parent_id
                    WHERE
                        main.pk_id = $category_id";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }
    
    public function getDocumentDetail($category_id) {

        $querypro = "SELECT
                        documents.pk_id,
                        documents.doc_title,
                        documents.doc_path,
                        documents.doc_category_id
                    FROM
                        documents
                    WHERE
                        documents.doc_category_id = $category_id";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

}

?>