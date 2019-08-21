<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostRating extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'post_ratings';

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = false;

}
