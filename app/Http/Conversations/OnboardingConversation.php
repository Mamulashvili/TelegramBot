<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Services\UserDataService;


class OnboardingConversation extends Conversation {

    /**
     * The OnboardingConversation instance.
     *
     * @var protected firstname
     */
    protected $firstName;

    /**
     * The OnboardingConversation instance.
     *
     * @var protected age
     */
    protected $age;

    /**
     * The OnboardingConversation instance.
     *
     * @var protected array user information
     */
    protected $user = [];

    public function __construct($bot) {

        $this->user = $bot->getUser();
    }

    /**
     * Ask name to user
     *
     * @return void
     */
    public function askName(): void {

        $this->ask('Привет! Как вас зовут?', function($answer) {
            $this->firstName = $answer->getText();
            if(trim($answer) !== '' && !preg_match('/[А-Яа-яЁё]/u', $this->firstName))
                return $this->repeat('текст должен содержать только русские буквы');
            $this->say('Приятно познакомиться, '.$this->firstName);
            $this->askAge();
        });
    }

    /**
     * Ask age to user
     *
     * @return void
     */
    public function askAge(): void {

        $this->ask('Еще один момент - сколько вам лет?', function($answer) {
            $this->age = $answer->getText();
            if(!ctype_digit($this->age))
                return $this->repeat('похоже возраст, вы ввели неправильный');
            if(UserDataService::updateUser($this->user->getId(), $this->firstName, (int) $this->age))
                $this->say('Отлично - это все, что нам нужно, '.$this->firstName);
        });
    }

    /**
     * {@inheritdoc}
     * This will be called immediately after OnboardingConversation is created
     * 
     */
    public function run() {

        UserDataService::createUser($this->user);
        $this->askName();
    }
}