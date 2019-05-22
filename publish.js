function inviaMessaggio()
{
	var stringa = document.getElementById("messaggio").value;
	var message = new Paho.MQTT.Message(stringa);
	message.destinationName = "client/giorgio";
	mqttClient.send(message);
}