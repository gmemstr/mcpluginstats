# MC Plugin Stats
[TOC]
## Overview

MC Plugin Stats was originally developed as a way to track which servers use the developers plugins, and provide an easy way to view the information. However, it has since ceased development and I'm open sourcing it.

## Setup

MC Plugin Stats requires a few things to work:

1. A [UserApp.io](http://userapp.io) API key (replace all instances of `USERAPP_API_KEY`)
2. A MySQL database named `mcpluginstats`.
3. A PHP web host.

#### Database layout

Name: mcpluginstats

plugins

| user | api_key | description | srvnum | name |
|--------|--------|--------|--------|--------|
|text|text|mediumtext|int(11)|text|

servers

| srvip | srvport | online | api_key | srvname |
|--------|--------|--------|--------|--------|
|text|smallint|boolean|mediumtext|text|

## Documentation

The documentation source and compiled HTML can be found in `/api/`. The [Slate](https://github.com/tripit/slate) markdown is in `/api/slate/source/index.md`. It includes what data to send to the server, and the data returned.

## Java Plugin

The Minecraft server plugin is completely optional, but helps if you are using the platform for Minecraft server plugins. It can be found in `/java/plugin/src`. It can be used like so:

```java
// Main java class
int port = Bukkit.getPort();
Track track = new Track();

@Override
public void onEnable(){
	if(Bukkit.getPluginManager().getPlugin("Plugin Tracker") != null){
		track.DoIt(port, 1);
	}
}
```

```java
// Track.java
import com.gabrielsimmer.tracker.Tracker;

public class Track {
	public void DoIt(int port, int online){
		try{
			Tracker tracker = new Tracker();
			tracker.Send("KEY", port, online);
		}catch(Exception e){
			System.out.println("Tracker not insralled.");
		}
	}
}

```