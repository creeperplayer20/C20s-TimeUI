<?php

declare(strict_types=1);

namespace creeperplayer20\timeui;

use pocketmine\console\ConsoleCommandSender;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use creeperplayer20\timeui\jojoe77777\FormAPI\SimpleForm;

use pocketmine\player\Player;

class Main extends PluginBase implements Listener{

public function onEnable() : void{
    
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    
}
    
public function timeui($player){
    $form = new SimpleForm(function(Player $player, $data){
        if($data === null){
            
            return true;
        }
        switch($data){
            case 0:

                $this->getServer()->dispatchCommand(new ConsoleCommandSender($this->getServer(), $this->getServer()->getLanguage()), "time set sunrise");

            break;

            case 1:

                $this->getServer()->dispatchCommand(new ConsoleCommandSender($this->getServer(), $this->getServer()->getLanguage()), "time set day");

            break;

            case 2:

                $this->getServer()->dispatchCommand(new ConsoleCommandSender($this->getServer(), $this->getServer()->getLanguage()), "time set noon");

            break;

            case 3:

                $this->getServer()->dispatchCommand(new ConsoleCommandSender($this->getServer(), $this->getServer()->getLanguage()), "time set sunset");

            break;

            case 4:

                $this->getServer()->dispatchCommand(new ConsoleCommandSender($this->getServer(), $this->getServer()->getLanguage()), "time set night");

            break;

            case 5:

                $this->getServer()->dispatchCommand(new ConsoleCommandSender($this->getServer(), $this->getServer()->getLanguage()), "time set midnight");

            break;

            case 6:

            break;
        }
    });
        
    $title = $keyFromConfig = $this->getConfig()->get("title");
    $sunrise = $keyFromConfig = $this->getConfig()->get("sunrise");
    $day = $keyFromConfig = $this->getConfig()->get("day");
    $noon = $keyFromConfig = $this->getConfig()->get("noon");
    $sunset = $keyFromConfig = $this->getConfig()->get("sunset");
    $night = $keyFromConfig = $this->getConfig()->get("night");
    $midnight = $keyFromConfig = $this->getConfig()->get("midnight");
    $exit = $keyFromConfig = $this->getConfig()->get("exit");

    $form->setTitle($title);
    $form->addButton($sunrise);
    $form->addButton($day);
    $form->addButton($noon);
    $form->addButton($sunset);
    $form->addButton($night);
    $form->addButton($midnight);
    $form->addButton($exit);
    $player->sendForm($form);
}

public function onCommand(CommandSender $sender,Command $cmd,string $label,array $args) : bool{

    if($cmd->getName() == "timeui"){
        $this->timeui($sender);
    } return true;
    
}}
