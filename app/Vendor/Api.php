<?php

namespace App\Vendor;

use JetBrains\PhpStorm\ArrayShape;

class Api
{
    private string $status;
    private string $message = '';
    private array $data = [];

    private function __construct($status = 'error')
    {
        $this->status = $status;
    }

    /**
     * Creates new Api object with 'error' status set
     *
     * @return Api
     */
    public static function error(): Api
    {
        return new self();
    }

    /**
     * Creates new Api object with 'success' status set
     *
     * @return Api
     */
    public static function success(): Api
    {
        return new self('success');
    }

    /**
     * Loads message data into API
     *
     * @param string $message
     *
     * @return $this
     */
    public function message(string $message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Loads data into API
     *
     * @param array $data
     *
     * @return $this
     */
    public function data(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Returns API call body data
     *
     * @return array
     */
    #[ArrayShape(['status' => "string", 'message' => "string", 'data' => "array"])]
    public function response(): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data,
        ];
    }


}
