<?php
namespace ZfcUser\Validator;

/**
 * Class NoRecordExists
 * @package ZfcUser\Validator
 */
class NoRecordExists extends AbstractRecord
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function isValid($value)
    {
        $this->setValue($value);

        if ($this->query($value)) {
            $this->error(self::ERROR_RECORD_FOUND);
            return false;
        }

        return true;
    }
}
