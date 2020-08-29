<?php

namespace App\Services\ErrorHandleService;

final class ErrorHandleDTO
{
    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $devMessage;

    /**
     * @var string
     */
    private $status;

    /**
     * @var integer
     */
    private $code;

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return ErrorHandleDTO
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDevMessage(): ?string
    {
        return $this->devMessage;
    }

    /**
     * @param string $devMessage
     * @return ErrorHandleDTO
     */
    public function setDevMessage(string $devMessage): self
    {
        $this->devMessage = $devMessage;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return ErrorHandleDTO
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return ErrorHandleDTO
     */
    public function setCode(int $code): self
    {
        $this->code = $code;
        return $this;
    }
}
