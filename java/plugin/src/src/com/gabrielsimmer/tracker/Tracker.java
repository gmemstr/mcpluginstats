package com.gabrielsimmer.tracker;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.StandardCharsets;

public class Tracker {

	public void Send(String key, int _port, int _status){	

		try{
			String urlParameters = "port=" + _port + "&api_key=" + key + "&online=" + _status;
			byte[] postData = urlParameters.getBytes(StandardCharsets.UTF_8);
			//int postDataLength = postData.length;
			String request = "http://mc.gabrielsimmer.com/mcpluginstats/api/info.php";
			URL url = new URL(request);
			HttpURLConnection conn = (HttpURLConnection) url.openConnection();
			conn.setDoOutput(true);
			conn.setInstanceFollowRedirects(false);
			conn.setRequestMethod("POST");
			// conn.setRequestProperty("Content-Length", Integer.toString(postDataLength));
			conn.setUseCaches(false);
			try (DataOutputStream wr = new DataOutputStream(conn.getOutputStream())) {
				wr.write(postData);
				System.out.println("Sent data to server!");
				wr.flush();
				wr.close();
			}catch(Exception e){
				System.out.println(e.getStackTrace());
			}

			//Get Response	
			InputStream is = conn.getInputStream();
			BufferedReader rd = new BufferedReader(new InputStreamReader(is));
			String line;
			StringBuffer response = new StringBuffer(); 
			while((line = rd.readLine()) != null) {
				response.append(line);
				response.append('\r');
			}
			System.out.println(response);
			rd.close();

		}catch(Exception e){
			System.out.println(e.getStackTrace());
		}

	}

}
