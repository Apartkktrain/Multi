<?php
namespace apart\zisseki;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Server;
use pocketmine\block\Block;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\utils\Config;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\form\Form;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\entity\object\ItemEntity;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\scheduler\Task;
use pocketmine\event\player\PlayerChatEvent;

use onebone\economyapi\EconomyAPI;

use apart\zisseki\Form\home;

class Main extends  pluginBase implements Listener
{
	 private $config;

	public function onEnable()
	{
		$this->getLogger()->notice("実績システム構築完了");
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->config = new Config($this->getDataFolder() . "001.yml", Config::YAML);///めざせ採掘マスター 100回

	}

	public function onJoin(PlayerJoinEvent $event)
	{
	    $player = $event->getPlayer();
        $name = $event->getPlayer()->getName();	 
        $kazu = "0";   

	    $player->sendMessage("§a[実績マネージャー]新しい実績があります!さっそく確認してみましょう!");
	    if (!$this->config->exists($name)) 
	    {
	    $this->config->set($name,0);
	    $this->config->save();
	    }
	}

	#コマンド系です
  public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool
    {
        if(!$sender instanceof Player) 
          $player = $sender;
          $name = $sender->getName();
         
        switch($label)
        {
         case 'zisseki':

          return true;
           break;



        }
          return true;        
    }
   public function onbreak(BlockBreakEvent $event)
   {
        $player = $event->getPlayer();
        $name = $event->getPlayer()->getName();


        $id = $event->getBlock()->getId();
        $kazu = $this->config->get($name);
        if ($id === 1) 
        {
        	$this->config->set($name,$kazu + 1);
        	$this->config->save();
          $this->config->reload();
        }

   }

       public function onDisable()
    {
      $this->config->save();


    }

}