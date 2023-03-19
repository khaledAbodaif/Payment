<?php

namespace Khaleds\Payment\Console;

use Illuminate\Console\Command;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;

class PaymentInstall extends Command
{
    use RunCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'payment:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install package and publish assets';

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Publish Vendor Assets');
        $this->callSilent('optimize:clear');
        $this->yarnCommand(['install']);
        $this->yarnCommand(['build']);
        $this->artisanCommand(["migrate"]);
        $this->artisanCommand(["optimize:clear"]);
        $this->info('payment installed successfully.');
    }
}
