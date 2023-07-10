<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class MakeReply extends Component
{
    public string|null $to_id;

    /**
     * Create a new component instance.
     */
    public function __construct($post = null)
    {
        if ($post) {
            $this->to_id = $post['id'];
        } else {
            $this->to_id = null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.make-reply', [
            'id' => $this->to_id,
            'quote' => self::quote(),
        ]);
    }

    /**
     * @see https://github.com/laravel/framework/blob/6.x/src/Illuminate/Foundation/Inspiring.php
     *
     * Get an inspiring quote.
     *
     * @return string
     */
    public static function quote()
    {
        return Collection::make([
            'When there is no desire, all things are at peace. - Laozi',
            'Simplicity is the ultimate sophistication. - Leonardo da Vinci',
            'Simplicity is the essence of happiness. - Cedric Bledsoe',
            'Smile, breathe, and go slowly. - Thich Nhat Hanh',
            'Simplicity is an acquired taste. - Katharine Gerould',
            'Well begun is half done. - Aristotle',
            'He who is contented is rich. - Laozi',
            'Very little is needed to make a happy life. - Marcus Antoninus',
            'It is quality rather than quantity that matters. - Lucius Annaeus Seneca',
            'Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant',
            'Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci',
            'An unexamined life is not worth living. - Socrates',
            'Happiness is not something readymade. It comes from your own actions. - Dalai Lama',
            'The only way to do great work is to love what you do. - Steve Jobs',
            'The whole future lies in uncertainty: live immediately. - Seneca',
            'Waste no more time arguing what a good man should be, be one. - Marcus Aurelius',
            'It is not the man who has too little, but the man who craves more, that is poor. - Seneca',
            'I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger',
            'Order your soul. Reduce your wants. - Augustine',
            'Be present above all else. - Naval Ravikant',
            'Let all your things have their places; let each part of your business have its time. - Benjamin Franklin',
            'If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius',
            'No surplus words or unnecessary actions. - Marcus Aurelius',
            'People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius',
        ])->random();
    }
}
