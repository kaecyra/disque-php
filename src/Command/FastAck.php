<?php
namespace Disque\Command;

use Disque\Exception;

class FastAck extends BaseCommand implements CommandInterface
{
    /**
     * Validate the given arguments
     *
     * @param array $arguments Arguments
     * @return array|null Modified arguments (null to leave as-is)
     * @throws Disque\Exception\InvalidCommandArgumentException
     */
    protected function validate(array $arguments)
    {
        if (empty($arguments)) {
            throw new Exception\InvalidCommandArgumentException($this, $arguments);
        }
    }

    /**
     * This command, with all its arguments, ready to be sent to Disque
     *
     * @return array Command (separated in parts)
     */
    public function build()
    {
        return array_merge(['FASTACK'], $this->arguments);
    }

    /**
     * Parse response
     *
     * @param mixed $response Response
     * @return int Number of jobs deleted
     * @throws Disque\Exception\InvalidCommandResponseException
     */
    public function parse($response)
    {
        if (!is_numeric($response)) {
            throw new Exception\InvalidCommandResponseException($this, $response);
        }
        return (int) $response;
    }
}