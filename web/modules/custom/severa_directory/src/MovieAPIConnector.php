<?php
namespace Drupal\severa_directory;

class MovieApiConnector{
private $client;
private $query;

public function __construct(\Drupal\Core\Http\ClientFactory $client){
    $movie_api_config = \Drupal::state()->get(key:\Drupal\severa_directory\Form\MovieAPI::MOVIE_API_CONFIG_PAGE);
    $api_url=($movie_api_config['api_base_url'])?: 'https:://api.themoviedb.org';
    $api_key=($movie_api_config['api_key'])?:'';

    $query=['api_key'=>$api_key];
    $this->query=$query;
    $this->client = $client->fromOptions(
        [
            'base_url'=>$api_url,
            'query'=>$query


        ]
        );

}

public function discoverMovies(){
    $data =[];
    $endpoint ='/3/discover/movie';
    $options=['query'=> $this->query];
    try{
        $request = $this->client->get($endpoint, $options);
        $result = $request->getBody()->getContents();
        $data =json_decode($result);
    }
    catch(GuzzleHttp\Exception\RequestException $e){
        watchdog_exception(type:'severa_directory', $e, $e->getMessage());
    }
    return $data;
}

}