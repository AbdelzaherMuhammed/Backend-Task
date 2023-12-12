<?php

class VoiceRecorder
{
    private static $instance;
    private $voiceMessages = [];

    // Private constructor to prevent instantiation
    private function __construct()
    {
        echo "Voice Recorder instance created. <br>";
    }

    // Private clone method to prevent cloning
    private function __clone()
    {
        // Empty to prevent cloning
    }

    // Public method to get the instance of the class
    public static function getInstance(): VoiceRecorder
    {
        if (!self::$instance) {
            // If the instance doesn't exist, create it
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Public method to add a voice message
    public function voiceMessage($message)
    {
        $this->voiceMessages[] = $message;
        echo "Voice Message is: $message <br>";
    }

    // Public method to get the added voice messages
    public function getAddedMessages(): array
    {
        return $this->voiceMessages;
    }
}


// $voiceMessage = new VoiceRecorder(); // This will return an error

// Get singleton instances
$voiceMessageInstance1 = VoiceRecorder::getInstance();
$voiceMessageInstance2 = VoiceRecorder::getInstance();

// Log voice messages using the singleton instances
$voiceMessageInstance1->voiceMessage("Message 1");
$voiceMessageInstance2->voiceMessage("Message 2");

// Retrieve logged messages from the singleton instance
$loggedMessages = $voiceMessageInstance1->getAddedMessages();
echo "Voice Messages: " . implode(", ", $loggedMessages);

// The result Should be:
// [
//     Voice Recorder created.
//     Voice Messages: Message 1
//     Voice Messages: Message 2
//     Voice Messages: Message 1, Message 2
// ]
