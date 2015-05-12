<?php
namespace Disque\Queue;

class Job extends BaseJob implements JobInterface
{
    /**
     * Job body
     *
     * @var array
     */
    private $body = [];

    /**
     * Build a job with the given body
     *
     * @param array $body Body
     */
    public function __construct(array $body = [])
    {
        $this->setBody($body);
    }

    /**
     * Get job body
     *
     * @return array Job body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the job body
     *
     * @param array $body Body
     */
    public function setBody(array $body)
    {
        $this->body = $body;
    }
}