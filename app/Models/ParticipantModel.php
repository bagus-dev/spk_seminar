<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipantModel extends Model
{
    protected $table = 'participant_seminars';
    protected $usetimestamps = true;
    protected $allowedFields = ['seminar_id', 'user_id', 'criteria_1', 'criteria_2', 'criteria_3', 'criteria_4', 'criteria_5', 'percentage', 'impression', 'suggestion', 'created_at', 'updated_at'];

    public function spk($seminar_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('participant_seminars');
        $query_c1 = $builder->select('criteria_1')->where('seminar_id',$seminar_id)->get();
        $query_c2 = $builder->select('criteria_2')->where('seminar_id',$seminar_id)->get();
        $query_c3 = $builder->select('criteria_3')->where('seminar_id',$seminar_id)->get();
        $query_c4 = $builder->select('criteria_4')->where('seminar_id',$seminar_id)->get();
        $query_c5 = $builder->select('criteria_5')->where('seminar_id',$seminar_id)->get();

        $builder_criteria = $db->table('criterias');
        $query_criteria = $builder_criteria->get();
        $array_c1 = array();
        $array_c2 = array();
        $array_c3 = array();
        $array_c4 = array();
        $array_c5 = array();

        foreach($query_criteria->getResult() as $c) {
            if($c->id == '1') {
                foreach($query_c1->getResult() as $c1) {
                    if($c->keterangan == '1') {
                        $builder->selectMax('criteria_1', 'max_c1')->where('seminar_id',$seminar_id);
                        $query_max = $builder->get();

                        $formula = round($c1->criteria_1 / $query_max->getRow()->max_c1,2,PHP_ROUND_HALF_UP);
                        array_push($array_c1,$formula);
                    } else {
                        $builder->selectMin('criteria_1', 'min_c1')->where('seminar_id',$seminar_id);
                        $query_min = $builder->get();

                        $formula = round($query_min->getRow()->min_c1 / $c1->criteria_1,2,PHP_ROUND_HALF_UP);
                        array_push($array_c1,$formula);
                    }
                }
            } elseif($c->id == '2') {
                foreach($query_c2->getResult() as $c2) {
                    if($c->keterangan == '1') {
                        $builder->selectMax('criteria_2', 'max_c2')->where('seminar_id',$seminar_id);
                        $query_max = $builder->get();

                        $formula = round($c2->criteria_2 / $query_max->getRow()->max_c2,2,PHP_ROUND_HALF_UP);
                        array_push($array_c2,$formula);
                    } else {
                        $builder->selectMin('criteria_2', 'min_c2')->where('seminar_id',$seminar_id);
                        $query_min = $builder->get();

                        $formula = round($query_min->getRow()->min_c2 / $c2->criteria_2,2,PHP_ROUND_HALF_UP);
                        array_push($array_c2,$formula);
                    }
                }
            } elseif($c->id == '3') {
                foreach($query_c3->getResult() as $c3) {
                    if($c->keterangan == '1') {
                        $builder->selectMax('criteria_3', 'max_c3')->where('seminar_id',$seminar_id);
                        $query_max = $builder->get();

                        $formula = round($c3->criteria_3 / $query_max->getRow()->max_c3,2,PHP_ROUND_HALF_UP);
                        array_push($array_c3,$formula);
                    } else {
                        $builder->selectMin('criteria_3', 'min_c3')->where('seminar_id',$seminar_id);
                        $query_min = $builder->get();

                        $formula = round($query_min->getRow()->min_c3 / $c3->criteria_3,2,PHP_ROUND_HALF_UP);
                        array_push($array_c3,$formula);
                    }
                }
            } elseif($c->id == '4') {
                foreach($query_c4->getResult() as $c4) {
                    if($c->keterangan == '1') {
                        $builder->selectMax('criteria_4', 'max_c4')->where('seminar_id',$seminar_id);
                        $query_max = $builder->get();

                        $formula = round($c4->criteria_4 / $query_max->getRow()->max_c4,2,PHP_ROUND_HALF_UP);
                        array_push($array_c4,$formula);
                    } else {
                        $builder->selectMin('criteria_4', 'min_c4')->where('seminar_id',$seminar_id);
                        $query_min = $builder->get();

                        $formula = round($query_min->getRow()->min_c4 / $c4->criteria_4,2,PHP_ROUND_HALF_UP);
                        array_push($array_c4,$formula);
                    }
                }
            } elseif($c->id == '5') {
                foreach($query_c5->getResult() as $c5) {
                    if($c->keterangan == '1') {
                        $builder->selectMax('criteria_5', 'max_c5')->where('seminar_id',$seminar_id);
                        $query_max = $builder->get();

                        $formula = round($c5->criteria_5 / $query_max->getRow()->max_c5,2,PHP_ROUND_HALF_UP);
                        array_push($array_c5,$formula);
                    } else {
                        $builder->selectMin('criteria_5', 'min_c5')->where('seminar_id',$seminar_id);
                        $query_min = $builder->get();

                        $formula = round($query_min->getRow()->min_c5 / $c5->criteria_5,2,PHP_ROUND_HALF_UP);
                        array_push($array_c5,$formula);
                    }
                }
            }
        }

        $hasil_alternatif = array();

        for($i=0; $i < count($array_c1); $i++) {
            foreach($query_criteria->getResult() as $c) {
                if($c->id == '1') {
                    $formula1 = round($c->bobot * $array_c1[$i],2,PHP_ROUND_HALF_UP);
                } elseif($c->id == '2') {
                    $formula2 = round($c->bobot * $array_c2[$i],2,PHP_ROUND_HALF_UP);
                } elseif($c->id == '3') {
                    $formula3 = round($c->bobot * $array_c3[$i],2,PHP_ROUND_HALF_UP);
                } elseif($c->id == '4') {
                    $formula4 = round($c->bobot * $array_c4[$i],2,PHP_ROUND_HALF_UP);
                } elseif($c->id == '5') {
                    $formula5 = round($c->bobot * $array_c5[$i],2,PHP_ROUND_HALF_UP);
                }
            }

            $hasil = round($formula1 + $formula2 + $formula3 + $formula4 + $formula5,2,PHP_ROUND_HALF_UP);
            array_push($hasil_alternatif,$hasil);
        }

        $query_participant = $builder->where('seminar_id',$seminar_id)->get();
        $index = 0;

        foreach($query_participant->getResult() as $p) {
            $this->update($p->id, [
                'percentage' => $hasil_alternatif[$index],
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            $index++;
        }
    }
}