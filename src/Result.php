<?php

namespace ESC;


use JsonSerializable;

/**
 * @author Alessandro Bellanda <a.bellanda@gmail.com>
 */
class Result implements JsonSerializable
{
    private $message;
    private $data;
    private $totalRows;

    public function __construct($config = [])
    {
        $this->fromArray($config);
    }

    public function fromArray($config): void
    {
        foreach ($config as $name => $value) {
            if (property_exists($this, $name)) {
                $this->$name = $value;
            }
        }
    }

    public function toArray(): array
    {
        return [
            'message' => $this->getMessage(),
            'data' => $this->getData(),
            'totalRows' => $this->getTotalRows(),
        ];
    }

    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return array
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @param array $data
     * @return void
     */
    public function setData(?array $data): void
    {
        $this->data = $data;
    }

    /**
     * @param null $totalRows
     * @return Result
     */
    public function setTotalRows($totalRows): Result
    {
        $this->totalRows = $totalRows;
        return $this;
    }

    /**
     * @return null
     */
    public function getTotalRows()
    {
        return $this->totalRows;
    }
}
