<?php

namespace Speicher210\CloudinaryBundle\Cloudinary;

/**
 * Uploader wrapper class for Cloudinary Uploader.
 */
class Uploader extends \Cloudinary\Uploader
{
    /**
     * @param Cloudinary $cloudinary
     */
    public function __construct(Cloudinary $cloudinary)
    {
    }
}
