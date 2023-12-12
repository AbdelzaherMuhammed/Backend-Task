<?php
require_once 'VoiceRecorder.php';

use PHPUnit\Framework\TestCase;

class VoiceRecorderTest extends TestCase
{
    public function testVoiceRecorderSingleton()
    {
        // Get singleton instances
        $voiceMessageInstance1 = VoiceRecorder::getInstance();
        $voiceMessageInstance2 = VoiceRecorder::getInstance();

        // Log voice messages using the singleton instances
        $voiceMessageInstance1->voiceMessage("Message 1");
        $voiceMessageInstance2->voiceMessage("Message 2");

        // Retrieve voice messages from the singleton instance
        $loggedMessages = $voiceMessageInstance1->getAddedMessages();

        // Assert that the singleton instances are the same
        $this->assertSame($voiceMessageInstance1, $voiceMessageInstance2);
    }
}
