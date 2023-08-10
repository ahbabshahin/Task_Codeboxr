<?php

class Validation
{
      private $data;
      private $errors = [];
      private static $fields = ['title', 'content'];

      public function __construct($post)
      {
            $this->data = $post;
      }

      public function validate()
      {
            foreach (self::$fields as $field) {
                  if (!array_key_exists($field, $this->data)) {
                        trigger_error("$field is not present in data");
                        return;
                  }
                  $this->validateForm($field);
            }

            // $this->validateTitle();
            // $this->validateContent();
            return $this->errors;
      }

      private function validateForm($key)
      {
            $val = trim($this->data[$key]);

            if (empty($val)) {
                  $this->addError($key, "$key cannot be empty");
            } else {
                  if (!preg_match('/^[a-zA-Z0-9]/', $val)) {
                        $this->addError($key, "$key must be alphanumeric");
                  }
            }
      }

      private function validateContent()
      {
      }

      private function addError($key, $val)
      {
            $this->errors[$key] = $val;
      }
}
