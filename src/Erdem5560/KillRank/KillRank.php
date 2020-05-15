<?php

/*
      _____         _                     
     | ____|_ __ __| | ___ _ __ ___       
     |  _| | '__/ _` |/ _ \ '_ ` _ \      
     | |___| | | (_| |  __/ | | | | |     
     |_____|_|  \__,_|\___|_| |_| |_|     
          ____ ____   __    ___           
          | ___| ___| / /_  / _ \         
          |___ \___ \| '_ \| | | |        
           ___) |__) | (_) | |_| |        
          |____/____/ \___/ \___/         
     _  ___ _ _ ____             _    
    | |/ (_) | |  _ \ __ _ _ __ | | __
    | ' /| | | | |_) / _` | '_ \| |/ /
    | . \| | | |  _ < (_| | | | |   < 
    |_|\_\_|_|_|_| \_\__,_|_| |_|_|\_\
                                   
                                          */

namespace Erdem5560\KillRank;

use pocketmine\{Player, Server};
use pocketmine\plugin\PluginBase as P;
use pocketmine\event\Listener as L;
use pocketmine\event\player\{PlayerJoinEvent, PlayerDeathEvent};
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use _64FF00\PureChat\PureChat;

class KillRank extends P implements L{
	
	public $kill;
	
	public function onEnable(){
	$this->getServer()->getLogger()->info(TF::GREEN."KillRank Aktif Edildi.");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
	$this->kill = new Config($this->getDataFolder()."Kill.yml", Config::YAML);
	 }
	 
	 public function Giriş(PlayerJoinEvent $event){
	 if($this->kill->get($event->getPlayer()->getName()) == null){
    $this->kill->set($event->getPlayer()->getName(), 0);
    $this->kill->save();
	 }
	}

	 public function Kill(PlayerDeathEvent $event){
    $ölen = $event->getEntity()->getLastDamageCause();
    if($ölen instanceof EntityDamageByEntityEvent){
    $öldüren = $ölen->getDamager();
    if($öldüren instanceof Player){
   	$this->kill->set($öldüren->getName(), $this->kill->get($öldüren->getName()) + 1);
   	$this->kill->save();
  	$purechat = $this->getServer()->getPluginManager()->getPlugin("PureChat");
    $önceki = $this->kill->get($öldüren->getName());
    $yeni = $this->kill->get($öldüren->getName());
        # 10 Kill Alınca...
    if($yeni == 10){
    $purechat->setPrefix("Rütbe-İsmi", $öldüren);
    $öldüren->sendMessage(TF::GREEN."Rütbe Atladınız!");
        # 30 Olunca...
        }
    if($yeni == 30){
    $purechat->setPrefix("Rütbe-İsmi", $öldüren);
    $öldüren->sendMessage(TF::GREEN."Rütbe Atladınız!");
        }
        # 60 Olunca...
    if($yeni == 60){
    $purechat->setPrefix("Rütbe-İsmi", $öldüren);
    $öldüren->sendMessage(TF::GREEN."Rütbe Atladınız!");
        }
        # 100 Olunca...
    if($yeni == 100){
    $purechat->setPrefix("Rütbe-İsmi", $öldüren);
    $öldüren->sendMessage(TF::GREEN."Rütbe Atladınız!");
        }
        # 200 Olunca...
    if($yeni == 200){
    $purechat->setPrefix("Rütbe-İsmi", $öldüren);
    $öldüren->sendMessage(TF::GREEN."Rütbe Atladınız!");
        }
        # 300 Olunca...
    if($yeni == 300){
    $purechat->setPrefix("Rütbe-İsmi", $öldüren);
    $öldüren->sendMessage(TF::GREEN."Rütbe Atladınız!");
        }
      }
    }
  }
}
