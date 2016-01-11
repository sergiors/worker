<?php
namespace Sergiors\Worker\Command;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
interface NotificationCommandInterface extends CommandInterface
{
    /**
     * @param string $address
     * @param string|null $name
     */
    public function setFrom($address, $name = null);

    /**
     * @param string $address
     * @param string|null $name
     */
    public function setTo($address, $name = null);

    /**
     * @param string $subject
     */
    public function setSubject($subject);

    /**
     * @param string $body
     */
    public function setBody($body);
}
