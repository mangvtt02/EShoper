<?php

namespace Facade\FlareClient;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Facade\FlareClient\Http\Client;
use Facade\FlareClient\Truncation\ReportTrimmer;

class Api
{
    /** @var \Facade\FlareClient\Http\Client */
<<<<<<< HEAD
    protected $client;
=======
    private $client;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /** @var bool */
    public static $sendInBatches = true;

    /** @var array */
<<<<<<< HEAD
    protected $queue = [];
=======
    private $queue = [];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    public function __construct(Client $client)
    {
        $this->client = $client;

        register_shutdown_function([$this, 'sendQueuedReports']);
    }

    public static function sendReportsInBatches(bool $batchSending = true)
    {
        static::$sendInBatches = $batchSending;
    }

    public function report(Report $report)
    {
        try {
            if (static::$sendInBatches) {
                $this->addReportToQueue($report);
            } else {
                $this->sendReportToApi($report);
            }
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            //
        }
    }

    public function sendTestReport(Report $report)
    {
        $this->sendReportToApi($report);
    }

<<<<<<< HEAD
    protected function addReportToQueue(Report $report)
=======
    private function addReportToQueue(Report $report)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->queue[] = $report;
    }

    public function sendQueuedReports()
    {
        try {
            foreach ($this->queue as $report) {
                $this->sendReportToApi($report);
            }
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            //
        } finally {
            $this->queue = [];
        }
    }

<<<<<<< HEAD
    protected function sendReportToApi(Report $report)
=======
    private function sendReportToApi(Report $report)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->client->post('reports', $this->truncateReport($report->toArray()));
    }

<<<<<<< HEAD
    protected function truncateReport(array $payload): array
=======
    private function truncateReport(array $payload): array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return (new ReportTrimmer())->trim($payload);
    }
}
