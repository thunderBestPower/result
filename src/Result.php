<?php

namespace BlueWeb;

use JsonSerializable;


class Result implements JsonSerializable
{
    private ?string $message;
    private ?array $data;
    private $totalRows;

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->fromArray($config);
    }

    /**
     * @param $config
     * @return void
     */
    public function fromArray($config): void
    {
        foreach ($config as $name => $value) {
            if (property_exists($this, $name)) {
                $this->$name = $value;
            }
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'message' => $this->getMessage(),
            'data' => $this->getData(),
            'totalRows' => $this->getTotalRows(),
        ];
    }

    /**
     * @param string|null $message
     * @return void
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return array|null
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
     * @param array|null $data
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
