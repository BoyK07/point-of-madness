<?php

namespace App\Mail;

use App\Models\ContactSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ContactSubmissionReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public ContactSubmission $submission,
        protected ?string $attachmentPath = null,
        protected ?string $attachmentName = null,
        protected ?string $attachmentMime = null,
    ) {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: sprintf(
                'POM: [Contact • Point of Madness] %s: %s',
                $this->reasonLabel(),
                $this->submission->subject
            ),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.received',
            with: [
                'submission' => $this->submission,
                'reasonLabel' => $this->reasonLabel(),
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        if ($this->attachmentPath === null || !is_file($this->attachmentPath)) {
            return [];
        }

        $mime = $this->attachmentMime ?? mime_content_type($this->attachmentPath) ?: 'application/octet-stream';

        return [
            Attachment::fromPath($this->attachmentPath)
                ->as($this->attachmentName ?? basename($this->attachmentPath))
                ->withMime($mime),
        ];
    }

    /**
     * Resolve the human friendly label for the selected reason.
     */
    protected function reasonLabel(): string
    {
        return match ($this->submission->reason) {
            'booking' => 'Professional Booking',
            'general' => 'General Inquiries',
            'press' => 'Press & Media',
            'fans' => 'Fans / Say Hi',
            default => Str::title($this->submission->reason),
        };
    }
}
