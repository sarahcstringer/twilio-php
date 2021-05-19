<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Events\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Serialize;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class SinkTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->events->v1->sinks("DGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://events.twilio.com/v1/Sinks/DGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "status": "initialized",
                "sink_configuration": {
                    "arn": "arn:aws:kinesis:us-east-1:111111111:stream/test",
                    "role_arn": "arn:aws:iam::111111111:role/Role",
                    "external_id": "1234567890"
                },
                "description": "A Sink",
                "sid": "DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2015-07-30T20:00:00Z",
                "sink_type": "kinesis",
                "date_updated": "2015-07-30T20:00:00Z",
                "url": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "sink_test": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Test",
                    "sink_validate": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Validate"
                }
            }
            '
        ));

        $actual = $this->twilio->events->v1->sinks("DGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->events->v1->sinks->create("description", [], "kinesis");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = [
            'Description' => "description",
            'SinkConfiguration' => Serialize::jsonObject([]),
            'SinkType' => "kinesis",
        ];

        $this->assertRequest(new Request(
            'post',
            'https://events.twilio.com/v1/Sinks',
            null,
            $values
        ));
    }

    public function testCreateResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "status": "initialized",
                "sink_configuration": {
                    "arn": "arn:aws:kinesis:us-east-1:111111111:stream/test",
                    "role_arn": "arn:aws:iam::111111111:role/Role",
                    "external_id": "1234567890"
                },
                "description": "My Kinesis Sink",
                "sid": "DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2015-07-30T20:00:00Z",
                "sink_type": "kinesis",
                "date_updated": "2015-07-30T20:00:00Z",
                "url": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "sink_test": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Test",
                    "sink_validate": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Validate"
                }
            }
            '
        ));

        $actual = $this->twilio->events->v1->sinks->create("description", [], "kinesis");

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->events->v1->sinks("DGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://events.twilio.com/v1/Sinks/DGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testDeleteResponse(): void {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->events->v1->sinks("DGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();

        $this->assertTrue($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->events->v1->sinks->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://events.twilio.com/v1/Sinks'
        ));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sinks": [],
                "meta": {
                    "page": 0,
                    "page_size": 10,
                    "first_page_url": "https://events.twilio.com/v1/Sinks?PageSize=10&Page=0",
                    "previous_page_url": null,
                    "url": "https://events.twilio.com/v1/Sinks?PageSize=10&Page=0",
                    "next_page_url": null,
                    "key": "sinks"
                }
            }
            '
        ));

        $actual = $this->twilio->events->v1->sinks->read();

        $this->assertNotNull($actual);
    }

    public function testReadResultsResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sinks": [
                    {
                        "status": "initialized",
                        "sink_configuration": {
                            "arn": "arn:aws:kinesis:us-east-1:111111111:stream/test",
                            "role_arn": "arn:aws:iam::111111111:role/Role",
                            "external_id": "1234567890"
                        },
                        "description": "A Sink",
                        "sid": "DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "date_created": "2015-07-30T19:00:00Z",
                        "sink_type": "kinesis",
                        "date_updated": "2015-07-30T19:00:00Z",
                        "url": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "links": {
                            "sink_test": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Test",
                            "sink_validate": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Validate"
                        }
                    },
                    {
                        "status": "initialized",
                        "sink_configuration": {
                            "arn": "arn:aws:kinesis:us-east-1:222222222:stream/test",
                            "role_arn": "arn:aws:iam::111111111:role/Role",
                            "external_id": "1234567890"
                        },
                        "description": "ANOTHER Sink",
                        "sid": "DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab",
                        "date_created": "2015-07-30T20:00:00Z",
                        "sink_type": "kinesis",
                        "date_updated": "2015-07-30T20:00:00Z",
                        "url": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab",
                        "links": {
                            "sink_test": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab/Test",
                            "sink_validate": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab/Validate"
                        }
                    },
                    {
                        "status": "active",
                        "sink_configuration": {
                            "destination": "http://example.org/webhook",
                            "method": "POST",
                            "batch_events": true
                        },
                        "description": "A webhook Sink",
                        "sid": "DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac",
                        "date_created": "2015-07-30T21:00:00Z",
                        "sink_type": "webhook",
                        "date_updated": "2015-07-30T21:00:00Z",
                        "url": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac",
                        "links": {
                            "sink_test": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac/Test",
                            "sink_validate": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac/Validate"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 20,
                    "first_page_url": "https://events.twilio.com/v1/Sinks?PageSize=20&Page=0",
                    "previous_page_url": null,
                    "url": "https://events.twilio.com/v1/Sinks?PageSize=20&Page=0",
                    "next_page_url": null,
                    "key": "sinks"
                }
            }
            '
        ));

        $actual = $this->twilio->events->v1->sinks->read();

        $this->assertNotNull($actual);
    }

    public function testReadResultsInUseResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sinks": [
                    {
                        "status": "initialized",
                        "sink_configuration": {
                            "arn": "arn:aws:kinesis:us-east-1:111111111:stream/test",
                            "role_arn": "arn:aws:iam::111111111:role/Role",
                            "external_id": "1234567890"
                        },
                        "description": "A Sink",
                        "sid": "DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "date_created": "2015-07-30T19:00:00Z",
                        "sink_type": "kinesis",
                        "date_updated": "2015-07-30T19:00:00Z",
                        "url": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "links": {
                            "sink_test": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Test",
                            "sink_validate": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Validate"
                        }
                    },
                    {
                        "status": "initialized",
                        "sink_configuration": {
                            "arn": "arn:aws:kinesis:us-east-1:222222222:stream/test",
                            "role_arn": "arn:aws:iam::111111111:role/Role",
                            "external_id": "1234567890"
                        },
                        "description": "ANOTHER Sink",
                        "sid": "DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab",
                        "date_created": "2015-07-30T20:00:00Z",
                        "sink_type": "kinesis",
                        "date_updated": "2015-07-30T20:00:00Z",
                        "url": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab",
                        "links": {
                            "sink_test": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab/Test",
                            "sink_validate": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab/Validate"
                        }
                    },
                    {
                        "status": "active",
                        "sink_configuration": {
                            "destination": "http://example.org/webhook",
                            "method": "POST",
                            "batch_events": true
                        },
                        "description": "A webhook Sink",
                        "sid": "DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac",
                        "date_created": "2015-07-30T21:00:00Z",
                        "sink_type": "webhook",
                        "date_updated": "2015-07-30T21:00:00Z",
                        "url": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac",
                        "links": {
                            "sink_test": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac/Test",
                            "sink_validate": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac/Validate"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 20,
                    "first_page_url": "https://events.twilio.com/v1/Sinks?InUse=True&PageSize=20&Page=0",
                    "previous_page_url": null,
                    "url": "https://events.twilio.com/v1/Sinks?InUse=True&PageSize=20&Page=0",
                    "next_page_url": null,
                    "key": "sinks"
                }
            }
            '
        ));

        $actual = $this->twilio->events->v1->sinks->read();

        $this->assertNotNull($actual);
    }

    public function testReadResultsStatusResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sinks": [
                    {
                        "status": "active",
                        "sink_configuration": {
                            "destination": "http://example.org/webhook",
                            "method": "POST",
                            "batch_events": true
                        },
                        "description": "A webhook Sink",
                        "sid": "DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac",
                        "date_created": "2015-07-30T21:00:00Z",
                        "sink_type": "webhook",
                        "date_updated": "2015-07-30T21:00:00Z",
                        "url": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac",
                        "links": {
                            "sink_test": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac/Test",
                            "sink_validate": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaac/Validate"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 20,
                    "first_page_url": "https://events.twilio.com/v1/Sinks?Status=active&PageSize=20&Page=0",
                    "previous_page_url": null,
                    "url": "https://events.twilio.com/v1/Sinks?Status=active&PageSize=20&Page=0",
                    "next_page_url": null,
                    "key": "sinks"
                }
            }
            '
        ));

        $actual = $this->twilio->events->v1->sinks->read();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->events->v1->sinks("DGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("description");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['Description' => "description", ];

        $this->assertRequest(new Request(
            'post',
            'https://events.twilio.com/v1/Sinks/DGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            null,
            $values
        ));
    }

    public function testUpdateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "status": "initialized",
                "sink_configuration": {
                    "arn": "arn:aws:kinesis:us-east-1:111111111:stream/test",
                    "role_arn": "arn:aws:iam::111111111:role/Role",
                    "external_id": "1234567890"
                },
                "description": "My Kinesis Sink",
                "sid": "DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2015-07-30T20:00:00Z",
                "sink_type": "kinesis",
                "date_updated": "2015-07-30T20:00:00Z",
                "url": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "sink_test": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Test",
                    "sink_validate": "https://events.twilio.com/v1/Sinks/DGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Validate"
                }
            }
            '
        ));

        $actual = $this->twilio->events->v1->sinks("DGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("description");

        $this->assertNotNull($actual);
    }
}