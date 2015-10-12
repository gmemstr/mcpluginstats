package com.gabrielsimmer.tracker;

import org.bukkit.Bukkit;
import org.bukkit.plugin.java.JavaPlugin;

public class Main extends JavaPlugin {
	
	Tracker tracker = new Tracker();
	int port = Bukkit.getPort();
	
	public void onEnable(){
		tracker.Send("plugin_55f21c370ef46",port,1);
	}
	
	public void onDisable(){
		tracker.Send("plugin_55f21c370ef46",port,0);
	}
	
}
