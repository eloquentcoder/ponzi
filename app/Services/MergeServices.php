<?php

namespace App\Services;

class MergeServices {

    public static function mergeGetters()
    {
        $provideHelp = ProvideHelp::where([['is_activation', 0], ['merge_status', 0], ['is_admin', 0]])->get();
        $gethelp = GetHelp::where([['merge_status', 0], ['awaiting_to_receive', 1]])->get()->toArray();

        $sumProvidersCount;
        $sumGettersCount;

        $sumProvidersArray;
        $sumGettersArray;

        $counter = count($provideHelp) < 4 ? count($provideHelp) : 4;

        for ($i=0; $i < $counter; $i++) {
            $sumProvidersCount += $provideHelp[$counter]->amount;
            array_push($sumProvidersArray, $provideHelp[$counter]);
        }
        for ($i=0; $i < count($gethelp); $i++) {
            $sumGettersCount += $gethelp[$counter]->amount;
            if ($sumGettersCount > $sumProvidersCount) {
                return self::mergeAdmin($sumProvidersArray, $sumGettersArray);
            }
            if ($sumGettersCount == $sumProvidersCount) {
                return self::mergeUsers($sumProvidersArray, $sumGettersArray);
            }
            return self::mergeGetters();
        }
    }

    public static function mergeAdmin($providers, $getters)
    {
        foreach ($getters as $value) {
            if ($value > $providers[$i]) {
                $id = $value->id;
                $rem = $value->amount - $providers[$i];
                
                $value->delete();
            }
        }
    }

}
