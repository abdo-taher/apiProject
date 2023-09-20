<?php

return  [
'exporter' =>
            [
                'json'=> \Crm\Base\Export\jsonExport::class,
                'html'=>\Crm\Base\Export\htmlExport::class,
                'pdf'=>\Crm\Base\Export\pdfExport::class
            ]
];
