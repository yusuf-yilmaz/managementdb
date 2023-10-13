<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use yusuf\metriccollector\Collectors\MetricsCollector;

class MetricsController extends BaseController
{
    public function index()
    {
        $metricsCollector = new MetricsCollector();
        $globalMetrics = $metricsCollector->collectGlobalMetrics();
        $customMetrics = $metricsCollector->collectCustomMetric('example_custom_metric', function () {
            // Calculate the custom metric
            return 42;
        });

        // Send the metrics to the central collector or do something with them
    }
}
