<?php


namespace Speicher210\CloudinaryBundle\Factory;

use Speicher210\CloudinaryBundle\Cloudinary\Cloudinary;

class CloudinaryFactory
{
    public static function createCloudinary(array $config = array())
    {
        if (array_key_exists('url', $config)) {
            $url = parse_url($config['url']);

            if ($url === false || !array_key_exists('scheme', $url)) {
                throw new \InvalidArgumentException('Cloudinary URL must be in the form: cloudinary://api_key:api_secret@cloud_name');
            }

            if (array_key_exists('host', $url)) {
                $config['cloud_name'] = $url['host'];
            }

            if (array_key_exists('user', $url)) {
                $config['access_identifier']['api_key'] = $url['user'];
            }
            if (array_key_exists('pass', $url)) {
                $config['access_identifier']['api_secret'] = $url['pass'];
            }
        }

        if (!isset($config['cloud_name'], $config['access_identifier']['api_key'], $config['access_identifier']['api_secret'])) {
            throw new \InvalidArgumentException('Cloudinary URL not correctly set.');
        }

        return new Cloudinary(array(
            'cloud_name' => $config['cloud_name'],
            'api_key' => $config['access_identifier']['api_key'],
            'api_secret' => $config['access_identifier']['api_secret'],
        ));
    }
}