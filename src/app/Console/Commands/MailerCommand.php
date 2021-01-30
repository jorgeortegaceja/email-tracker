<?php
namespace EmailTracker\App\Console\Commands;
use Illuminate\Console\Command;
use EmailTracker\App\Models\Email;
use EmailTracker\App\Strateguies\MailerStrategy;

class MailerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:sender';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is in charge of executing the logic that sends the emails in the email traker package';

    /**
     * I inject the strategy that does the sending of emails
     *
     * @var Object
     */
    protected $mailerStrategy;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MailerStrategy $mailerStrategy)
    {
        parent::__construct();
        $this->mailerStrategy = $mailerStrategy;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->mailerStrategy->setInstance($this);

        $this->mailerStrategy->start();

        // $this->info('The command was successful!');
        // $this->line('Display this on the screen');
        // $this->table(
        //     ['Name', 'Email'],
        //     Email::all(['name', 'email'])->toArray()
        // );
    }
}