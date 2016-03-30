<?php

/**
 * It is a class to send email
 * @author ajmal.h
 *
 */
class App_Mail {

    /**
     * send email using smtp.gmail.com
     * @param array $options for sending mail
     * @return boolean
     */
    public static function send($options) {
        $body = '';
        $config = Zend_Registry::get('smtpConfig');
        if (isset($options['from']['email']) && $options['from']['email'] <> '') {
            $fromAddress = $options['from']['email'];
        } else {
            $fromAddress = $config->fromAddress;
        }
        if ($config->isSendMails == true) {
            if (!empty($options['template']) && file_exists(APPLICATION_PATH . $options['template'])) {
                $template = new App_File(APPLICATION_PATH . $options['template']);
                $body = $template->contents;
                if (is_array($options['additional'])) {
                    foreach ($options['additional'] as $key => $value) {
                        $body = str_replace('{' . $key . '}', $value, $body);
                    }
                }

                if (is_array($options['data'])) {
                    foreach ($options['data'] as $key => $value) {
                        $body = str_replace('{' . $key . '}', $value, $body);
                    }
                }
            } else {
                $body = $options['body'];
            }

            $smtpConfig = array('ssl' => $config->ssl,
                'port' => $config->port,
                'auth' => $config->auth,
                'username' => $config->username,
                'password' => $config->password
            );

            $transport = new Zend_Mail_Transport_Smtp($config->host, $smtpConfig);

            $mail = new Zend_Mail('utf-8');
            $mail->setBodyHtml($body);
            $mail->setFrom($config->fromAddress, $config->fromName);
            $mail->setReplyTo($fromAddress, $config->fromName);
            //if (APPLICATION_ENV == 'production') {
                foreach ($options['to'] as $to) {
                    $to['label'] = (empty($to['label'])) ? $to['email'] : $to['label'];
                    $mail->addTo($to['email'], $to['label']);
                }
            //} else {
                //$mail->addTo($config->toAddress, $config->toName);
            //}
            
            if(isset($options['bcc']['email']) && !empty($options['bcc']['email'])){
              $mail->addBcc($options['bcc']['email']);  
            }
            
            $mail->setSubject($options['subject']);
            try {
                $mail->send($transport);
                return true;
            } catch (Zend_Exception $e) {
                return $e->getMessage();
            }
        }

        return false;
    }

}
