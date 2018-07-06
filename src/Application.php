<?php
/**
 * Created by PhpStorm.
 * User: f1r3starter
 * Date: 06.07.18
 * Time: 13:45
 */

namespace app;

use Brackets\Brackets;

class Application
{
    private $filename;
    private static $messages = [
        'welcomeMessage' => "Please, enter full path to file with brackets\r\n",
        'correctBrackets' => "The string has correct brackets order.\r\n",
        'incorrectBrackets' => "The string has incorrect brackets order.\r\n"
    ];

    /**
     * Application constructor.
     */
    public function __construct()
    {
        echo self::$messages['welcomeMessage'];
        $this->filename = readline();
        try {
            die(
                $this->proceed() ?
                self::$messages['correctBrackets'] :
                self::$messages['incorrectBrackets']
            );
        } catch (\InvalidArgumentException $exception) {
            die($exception->getMessage() . "\r\n");
        } catch (\Exception $exception) {
            die($exception->getMessage() . "\r\n");
        }
    }

    /**
     * @return bool
     */
    private function proceed(): bool
    {
        $data = (new Filereader($this->filename))->read();
        return (new Brackets($data))->isCorrect();
    }
}