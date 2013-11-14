<?php

class ApiGifController extends ApiController {

	/**
     * Gif Model
     * @var gif
     */
    protected $gif;

    /**
     * Inject the models.
     * @param Confession $confession
     */
    public function __construct(Gif $gif)
    {
        $this->gif = $gif;
    }
    
    /**
     * Display a listing of all the gifs.
     *
     * @return Response
     */
    public function getIndex($limit = 100, $offset = 0)
    {
        $gifs = $this->gif->select('gif_id', 'url', 'thumb')
        ->orderBy('gif_id', 'DESC')->offset($offset)->limit($limit)->get();
        foreach ($gifs as $gif) {
            $gif->thumb = URL::to($gif->thumb);
        }
        return $this->response("gifs", $gifs->toArray(), 200);
    }

    public function getMine()
    {
        if(Auth::guest()) {
            return $this->response("message", "Pls login", 401);
        }

        $userID = Auth::user()->id;
        $gifs = $this->gif->select('gifs.gif_id', 'url', 'thumb')->orderBy('gif_id', 'DESC')
        ->join('user_gifs', 'gifs.gif_id', '=', 'user_gifs.gif_id')
        ->where('user_gifs.user_id', '=', $userID)->get();
        foreach ($gifs as $gif) {
            $gif->thumb = URL::to($gif->thumb);
        }
        return $this->response("gifs", $gifs->toArray(), 200);
    }

}