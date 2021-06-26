<?php namespace App\Traits;

/**
 * Trait FlashMessages
 * @package App\Traits
 */
trait FlashMessages
{
    /**
     * @var array
     */
    protected $errorMessages = [];

    /**
     * @var array
     */
    protected $infoMessages = [];

    /**
     * @var array
     */
    protected $successMessages = [];

    /**
     * @var array
     */
    protected $warningMessages = [];


    /**
     * Undocumented function
     *
     * @param [type] $message
     * @param [type] $type
     * @return void
     */
    protected function setFlashMessage($message, $type)
    {
        $model = 'infoMessages';

        switch ($type) {
            case 'info': {
                $model = 'infoMessages';
            }
                break;
            case 'error': {
                $model = 'errorMessages';
            }
                break;
            case 'success': {
                $model = 'successMessages';
            }
                break;
            case 'warning': {
                $model = 'warningMessages';
            }
                break;
        }

        if (is_array($message)) {
            foreach ($message as $key => $value) {
                array_push($this->model, $value);
            }
        } else {
            array_push($this->model, $message);
        }
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    protected function getFlashMessage()
    {
        return [
            'error' => $this->errorMessages,
            'info' => $this->infoMessages,
            'success' => $this->successMessages,
            'warning' => $this->$this->warningMessages
        ];
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    protected function showFlushMessages()
    {
        session()->falsh('error', $this->errorMessages);
        session()->falsh('info', $this->infoMessages);
        session()->falsh('success', $this->successMessages);
        session()->falsh('warning', $this->warningMessages);
    }
}