<?php

namespace App\Services;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;

class GoogleCalendarService
{
    protected $client;
    protected $calendarService;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setAuthConfig(storage_path('app/google-calendar/credentials.json'));
        $this->client->addScope(Google_Service_Calendar::CALENDAR);
        $this->client->setAccessType('offline');

        $this->calendarService = new Google_Service_Calendar($this->client);
    }

    public function createGoogleMeetEvent($summary, $description, $startDateTime, $endDateTime)
    {
        $event = new Google_Service_Calendar_Event([
            'summary' => $summary,
            'description' => $description,
            'start' => new Google_Service_Calendar_EventDateTime([
                'dateTime' => $startDateTime,
                'timeZone' => 'America/Los_Angeles',
            ]),
            'end' => new Google_Service_Calendar_EventDateTime([
                'dateTime' => $endDateTime,
                'timeZone' => 'America/Los_Angeles',
            ]),
            'conferenceData' => [
                'createRequest' => [
                    'requestId' => 'sample123',
                    'conferenceSolutionKey' => [
                        'type' => 'hangoutsMeet',
                    ],
                ],
            ],
        ]);

        $event = $this->calendarService->events->insert('primary', $event, ['conferenceDataVersion' => 1]);

        return $event->hangoutLink;
    }
}