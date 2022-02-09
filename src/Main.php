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
        
    $form->setTitle("§6TimeUI");
    $form->addButton("§gSunrise");
    $form->addButton("§eDay");
    $form->addButton("§bNoon");
    $form->addButton("§3Sunset");
    $form->addButton("§9Night");
    $form->addButton("§1Midnight");
    $form->addButton("§c§lExit");
    $player->sendForm($form);
}

public function onCommand(CommandSender $sender,Command $cmd,string $label,array $args) : bool{

    if($cmd->getName() == "timeui"){
        $this->timeui($sender);
    } return true;
    
}}
