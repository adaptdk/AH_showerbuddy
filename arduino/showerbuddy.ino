#include <WiFi.h>
#include <HTTPClient.h>

const String BASEURL = "http://192.168.0.130/api/states/";
char ssid[] = "AdaptWifi2.4G";
char password[] = "helloadapt";
int lastSensorValue = null;

void setup() {
  pinMode(A0, INPUT);
  Serial.begin(115200);

  delay(4000);

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi..");
  }

  Serial.println("Connected to the WiFi network");
}

void loop() {
	if (WiFi.status() != WL_CONNECTED) {
	  Serial.println("Error in WiFi connection");
		delay(5000);
		return;
	}

	HTTPClient http;
	int sensorValue = digitalRead(A0);

	if (sensorValue == lastSensorValue) {
	  Serial.println("State has not changed, retrying in 5 seconds...");
	  delay(5000);
		return;
	}

	lastSensorValue = sensorValue;
	Serial.println(sensorValue);

	String requestUrl = BASEURL + (sensorValue == 1) ? 'occupied' : 'vacant';
	http.begin(requestUrl);

	int httpResponseCode = http.POST("");

	if (httpResponseCode > 0) {
	  String response = http.getString();
	  Serial.println(httpResponseCode);
	  Serial.println(response);
	} else {
	  Serial.print("Error on sending POST: ");
	  Serial.println(httpResponseCode);
	}

	http.end();
	Serial.println(getUrl());
	delay(2000);
}