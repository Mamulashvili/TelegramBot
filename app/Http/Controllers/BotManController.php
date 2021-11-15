<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\Drivers\Telegram\TelegramDriver;
use App\Http\Conversations\OnboardingConversation;
use Illuminate\Http\Request;


class BotManController extends Controller {

    /**
     * The botman instance.
     *
     * @var protected botman
     */
    protected $botman;

    /**
     * The botman instance.
     *
     * @var protected config
     */
    protected $config = [];


    public function __construct() {

        $this->botman = BotManFactory::create(config('services.botman'), new LaravelCache());
    }

    /**
     * Starts conversation with user, when start
     * button is pressed
     * 
     * @return void
     */
    public function handleBotManConversation (): void {

        DriverManager::loadDriver(TelegramDriver::class);

        $this->botman->hears('/start', function ($bot) {
            $bot->startConversation(new OnboardingConversation($bot));
        });

        $this->botman->fallback(function ($bot){
            $bot->reply('извини, я тебя не понимаю');
        });
        
        $this->botman->listen();
    }

    /**
     * Send text to user with telegram id
     * @param string $t_id telegram id
     * @param string $text
     * 
     * @return bool
     */
    public function sayHi(string $t_id, $text = 'Привет'): bool {

        $res = $this->botman->say($text, $t_id, TelegramDriver::class);
        return true;
    }
}