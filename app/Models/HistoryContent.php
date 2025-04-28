<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryContent extends Model
{
    protected $guarded = 'id';
    protected $fillable = [
        'user_id',
        'study_id',
        'service_id',
        'client_id',
        'team_id',
        'testimony_id',
        'contact_id',
        'article_id',
        'student_work_id'
    ];

    public function study()
    {
        return $this->belongsTo(Study::class, 'study_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function testimony()
    {
        return $this->belongsTo(Testimony::class, 'testimony_id');
    }
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
    public function studentWork()
    {
        return $this->belongsTo(StudentWork::class, 'student_work_id');
    }
}
