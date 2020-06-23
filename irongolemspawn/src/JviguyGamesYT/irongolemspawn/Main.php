<?php

declare(strict_types=1);

namespace JviguyGamesYT\irongolemspawn;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginManager;
use JviguyGamesYT\irongolemspawn\irongolem;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this , $this);
        $this->getLogger()->Info('Iron Golem Spawn Plugin has been enabled');
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()) {
            case "irongolem":
                $name = $sender->getName();
                $server = $sender->getServer();
                $player = $sender->getServer()->getPlayer($name);
                $pos = $player->getPosition();
                $irongolem = new \JviguyGamesYT\irongolemspawn\IronGolem($pos->getLevel(), \JviguyGamesYT\irongolemspawn\IronGolem::createBaseNBT($pos, new \pocketmine\math\Vector3(0,0,0)));
                $irongolem->spawnTo($player);
            break;
        }
        return true;
    }

}
