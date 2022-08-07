#include <WiFiClient.h>
#include <ESP8266WiFi.h> //Library untuk wifi pada nodemcu
#include <NewPing.h>

// Transmisi data menggunakan HTTP sbegai client
#include <ESP8266HTTPClient.h>

// Wifi
const char *ssid = "Infinix"; // Koneksikan ke ssid
const char *pass = "adekrafli0807";     // ketikkan passwd
WiFiClient client;                 // Wifi module dalam mdode Client

#define triggerPin D5
#define echoPin D6

String IDDevice = "21";

void setup()
{
  Serial.begin(115200);
  pinMode(triggerPin, OUTPUT);
  pinMode(echoPin, INPUT);

  // Koneksi kedalam gateway
  WiFi.hostname("Water-Level");        // hotname pada nodemcu
  Serial.println("Menyambungkan Ke "); // mencoba terhubung ke dalam gateway
  Serial.println(ssid);

  WiFi.begin(ssid, pass);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(">>");
  }
  Serial.println();
  Serial.println("Koneksi Berhasil");
  //------------------------------------------------------------//
}
void loop()
{
  long duration, jarak;
  digitalWrite(triggerPin, LOW);
  delayMicroseconds(2);
  digitalWrite(triggerPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(triggerPin, LOW);
  duration = pulseIn(echoPin, HIGH);
  jarak = (duration / 2) / 29.1;
  Serial.println("jarak :");
  Serial.print(jarak);
  Serial.println(" cm");
  String DataRespon = SendData(String(jarak));
  Serial.println(DataRespon);
  delay(1000);
}

String SendData(String JARAK)
{
  // Sent Data
  HTTPClient httpSend;

  httpSend.begin(client, "http://192.168.155.220/smartwaternative/admin/include/masuk.php"); // Specify request destination
  httpSend.addHeader("Content-Type", "application/x-www-form-urlencoded");                 // Specify content-type header

  String postData = "jarak=" + String(JARAK) + "&iddevice=" + String(IDDevice);

  int httpCode = httpSend.POST(postData); // Send the request
  String payload = httpSend.getString();  // Get the response payload
  String StatusSend = "Error Request";

  if (httpCode == 200)
  {
    return payload;
  }
  else
  {
    return StatusSend;
  }
}
