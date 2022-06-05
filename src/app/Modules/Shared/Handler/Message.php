<?php

namespace App\Modules\Shared\Handler;

use Ramsey\Uuid\Uuid;

class Message
{
    private string $id;
    private string $source_module;
    private string $label;
    /**
     * @var array<string, mixed>
     */
    private array $content;

    /**
     * @param string $source_module
     * @param string $label
     * @param array<string, mixed> $content
     */
    public function __construct(string $source_module, string $label, array $content)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->source_module = $source_module;
        $this->label = $label;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSourceModule(): string
    {
        return $this->source_module;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return mixed[]
     */
    public function getContent(): array
    {
        return $this->content;
    }
}
