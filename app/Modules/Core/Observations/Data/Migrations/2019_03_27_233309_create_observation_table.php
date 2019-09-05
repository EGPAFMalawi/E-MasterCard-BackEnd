<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obs', function (Blueprint $table) {
            $table->increments('obs_id');
            $table->integer('person_id')->unsigned()->index();
            $table->integer('concept_id')->unsigned()->default(0)->index();
            $table->integer('encounter_id')->unsigned()->nullable()->index();
            $table->integer('order_id')->unsigned()->nullable();
            $table->dateTime('obs_datetime');
            $table->integer('location_id')->nullable();
            $table->integer('obs_group_id')->nullable();
            $table->string('accession_number')->nullable();
            $table->integer('value_group_id')->nullable();
            $table->boolean('value_boolean')->nullable();
            $table->integer('value_coded')->nullable();
            $table->integer('value_coded_name_id')->nullable();
            $table->integer('value_drug')->nullable();
            $table->dateTime('value_datetime')->nullable();
            $table->float('value_numeric')->nullable();
            $table->string('value_modifier')->nullable();
            $table->mediumText('value_text')->nullable();
            $table->json('value_json')->nullable();
            $table->dateTime('date_started')->nullable();
            $table->dateTime('date_stopped')->nullable();
            $table->string('comments')->nullable();

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('voided')->default(0);
            $table->integer('voided_by')->nullable();
            $table->dateTime('date_voided')->nullable();
            $table->string('void_reason')->nullable();

            $table->string('value_complex')->nullable();
            $table->string('uuid', 38)->unique();

            $table->foreign('encounter_id')
                ->references('encounter_id')
                ->on('encounter')
                ->onDelete('restrict');

            $table->foreign('concept_id')
                ->references('concept_id')
                ->on('concept')
                ->onDelete('restrict');

            $table->foreign('person_id')
                ->references('person_id')
                ->on('person')
                ->onDelete('restrict');
        });

        DB::statement("CREATE VIEW  visit_outcome_event AS
                            SELECT
                                o.person_id,
                                o.encounter_id,
                                o.birthdate,
                                o.gender,
                                o.encounter_datetime,
                                o.voided,
                            
                                e1.value_text AS \"event_type\",
                                e2.value_numeric AS \"weight\",
                                e3.value_text AS \"preg_breast_feeding\",
                                e4.value_text AS \"tb_tatus\",
                                e5.value_text AS \"side effects\",
                                e6.value_numeric AS \"pill_count\",
                                e7.value_numeric AS \"doses_missed\",
                                e8.value_text AS \"art_regimen\",
                                e9.value_numeric AS \"arvs_given_no_of_tablets\",
                                e10.value_numeric AS \"arvs_given_to\",
                                e11.value_text AS \"cpt_ipt_given_options\",
                                e12.value_numeric AS \"cpt_ipt_given_no_of_tablets\",
                                e13.value_numeric AS \"months_on_art\",
                                e14.value_text AS \"viral_load_sample_taken\",
                                e15.value_numeric AS \"viral_load_result\",
                                e16.value_datetime AS \"next_appointment_Date\",
                                e17.value_text AS \"adverse_outcome\",
                                e18.value_text AS \"family_planning_depo_given\",
                                e19.value_numeric AS \"family_planning_depo_no_of_condoms\",
                                e20.value_numeric AS \"height\",
                                e21.value_numeric AS \"age\",
                                e22.value_text AS \"viral_load_result_symbol\"
                            
                            
                            FROM
                                (SELECT DISTINCT
                                    a.person_id, a.encounter_id, p.birthdate,p.gender,b.encounter_datetime, b.voided
                                 FROM
                                     obs a join encounter b on a.encounter_id = b.encounter_id join encounter_type c on c.encounter_type_id = b.encounter_type join person p on p.person_id = a.person_id  where c.encounter_type_id = 4
                                 ) o
                                LEFT JOIN obs e1
                                    ON e1.person_id = o.person_id AND e1.encounter_id = o.encounter_id AND e1.concept_id = 32
                                LEFT JOIN obs e2
                                    ON e2.person_id = o.person_id AND e2.encounter_id = o.encounter_id AND e2.concept_id = 33
                                LEFT JOIN obs e3
                                    ON e3.person_id = o.person_id AND e3.encounter_id = o.encounter_id AND e3.concept_id = 34
                                LEFT JOIN obs e4
                                        ON e4.person_id = o.person_id AND e4.encounter_id = o.encounter_id AND e4.concept_id = 35
                                LEFT JOIN obs e5
                                        ON e5.person_id = o.person_id AND e5.encounter_id = o.encounter_id AND e5.concept_id = 36
                                LEFT JOIN obs e6
                                        ON e6.person_id = o.person_id AND e6.encounter_id = o.encounter_id AND e6.concept_id = 37
                                LEFT JOIN obs e7
                                        ON e7.person_id = o.person_id AND e7.encounter_id = o.encounter_id AND e7.concept_id = 38
                                LEFT JOIN obs e8
                                        ON e8.person_id = o.person_id AND e8.encounter_id = o.encounter_id AND e8.concept_id = 39
                                LEFT JOIN obs e9
                                        ON e9.person_id = o.person_id AND e9.encounter_id = o.encounter_id AND e9.concept_id = 40
                                LEFT JOIN obs e10
                                        ON e10.person_id = o.person_id AND e10.encounter_id = o.encounter_id AND e10.concept_id = 41
                                LEFT JOIN obs e11
                                        ON e11.person_id = o.person_id AND e11.encounter_id = o.encounter_id AND e11.concept_id = 42
                                LEFT JOIN obs e12
                                        ON e12.person_id = o.person_id AND e12.encounter_id = o.encounter_id AND e12.concept_id = 43
                                LEFT JOIN obs e13
                                        ON e13.person_id = o.person_id AND e13.encounter_id = o.encounter_id AND e13.concept_id = 44
                                LEFT JOIN obs e14
                                        ON e14.person_id = o.person_id AND e14.encounter_id = o.encounter_id AND e14.concept_id = 45
                                LEFT JOIN obs e15
                                        ON e15.person_id = o.person_id AND e15.encounter_id = o.encounter_id AND e15.concept_id = 46
                                LEFT JOIN obs e16
                                        ON e16.person_id = o.person_id AND e16.encounter_id = o.encounter_id AND e16.concept_id = 47
                                LEFT JOIN obs e17
                                        ON e17.person_id = o.person_id AND e17.encounter_id = o.encounter_id AND e17.concept_id = 48
                                LEFT JOIN obs e18
                                        ON e18.person_id = o.person_id AND e18.encounter_id = o.encounter_id AND e18.concept_id = 49
                                LEFT JOIN obs e19
                                        ON e19.person_id = o.person_id AND e19.encounter_id = o.encounter_id AND e19.concept_id = 50
                                LEFT JOIN obs e20
                                        ON e20.person_id = o.person_id AND e20.encounter_id = o.encounter_id AND e20.concept_id = 51
                                LEFT JOIN obs e21
                                        ON e21.person_id = o.person_id AND e21.encounter_id = o.encounter_id AND e21.concept_id = 52
                                LEFT JOIN obs e22
                                        ON e22.person_id = o.person_id AND e22.encounter_id = o.encounter_id AND e22.concept_id = 53
                            "
        );
        DB::statement("CREATE VIEW  clinic_registration AS
                        SELECT
                            o.person_id,
                            o.encounter_id,
                            o.birthdate,
                            o.gender,
                            o.encounter_datetime,
                            o.voided,
                            TIMESTAMPDIFF(YEAR, o.birthdate, e6.value_datetime)  AS \"registration_age\",
                        
                            e1.value_datetime AS \"transfer_in_date\",
                            e2.value_text AS \"art_reg_no\",
                            e3.value_text AS \"child_hcc_no\",
                            e4.value_numeric AS \"year\",
                            e5.value_text AS \"registration_type\",
                            e6.value_datetime AS \"registration_date\",
                            e7.value_datetime AS \"registration_art_start_date\",
                            e8.value_numeric AS \"registration_age_at_initiation\",
                            e9.value_text AS \"registration_age_at_initiation_unit\"
                        
                            FROM
                            (SELECT DISTINCT
                            a.person_id, a.encounter_id, p.birthdate,p.gender,b.encounter_datetime, b.voided
                            FROM
                            obs a join encounter b on a.encounter_id = b.encounter_id join encounter_type c on c.encounter_type_id = b.encounter_type join person p on p.person_id = a.person_id  where c.encounter_type_id = 1
                            ) o
                            LEFT JOIN obs e1
                            ON e1.person_id = o.person_id AND e1.encounter_id = o.encounter_id AND e1.concept_id = 28
                            LEFT JOIN obs e2
                            ON e2.person_id = o.person_id AND e2.encounter_id = o.encounter_id AND e2.concept_id = 29
                            LEFT JOIN obs e3
                            ON e3.person_id = o.person_id AND e3.encounter_id = o.encounter_id AND e3.concept_id = 30
                            LEFT JOIN obs e4
                            ON e4.person_id = o.person_id AND e4.encounter_id = o.encounter_id AND e4.concept_id = 31
                            LEFT JOIN obs e5
                            ON e5.person_id = o.person_id AND e5.encounter_id = o.encounter_id AND e5.concept_id = 55
                            LEFT JOIN obs e6
                            ON e6.person_id = o.person_id AND e6.encounter_id = o.encounter_id AND e6.concept_id = 56
                            LEFT JOIN obs e7
                            ON e7.person_id = o.person_id AND e7.encounter_id = o.encounter_id AND e7.concept_id = 57
                            LEFT JOIN obs e8
                            ON e8.person_id = o.person_id AND e8.encounter_id = o.encounter_id AND e8.concept_id = 58
                            LEFT JOIN obs e9
                            ON e9.person_id = o.person_id AND e9.encounter_id = o.encounter_id AND e9.concept_id = 59
                            "
        );

/*


 SELECT
                            o.person_id,
                            o.encounter_id,
                            o.birthdate,
                            o.gender,
                            o.encounter_datetime,
                            o.voided,

                            e1.value_datetime AS "transfer_in_date",
                            e2.value_text AS "art_reg_no",
                            e3.value_text AS "child_hcc_no",
                            e4.value_numeric AS "year",
                            e5.value_text AS "registration_type",
                            e6.value_datetime AS "registration_date",
                            e7.value_datetime AS "registration_art_start_date",
                            e8.value_numeric AS "registration_age_at_initiation",
                            e9.value_text AS "registration_age_at_initiation_unit"

                            FROM
                            (SELECT DISTINCT
                            a.person_id, a.encounter_id, p.birthdate,p.gender,b.encounter_datetime, b.voided, DATEDIFF('e6.value_datetime','p.birthdate') as Age_at_reg
                            FROM
                            obs a join encounter b on a.encounter_id = b.encounter_id join encounter_type c on c.encounter_type_id = b.encounter_type join person p on p.person_id = a.person_id  where c.encounter_type_id = 1
                            ) o
                            LEFT JOIN obs e1
                            ON e1.person_id = o.person_id AND e1.encounter_id = o.encounter_id AND e1.concept_id = 28
                            LEFT JOIN obs e2
                            ON e2.person_id = o.person_id AND e2.encounter_id = o.encounter_id AND e2.concept_id = 29
                            LEFT JOIN obs e3
                            ON e3.person_id = o.person_id AND e3.encounter_id = o.encounter_id AND e3.concept_id = 30
                            LEFT JOIN obs e4
                            ON e4.person_id = o.person_id AND e4.encounter_id = o.encounter_id AND e4.concept_id = 31
                            LEFT JOIN obs e5
                            ON e5.person_id = o.person_id AND e5.encounter_id = o.encounter_id AND e5.concept_id = 55
                            LEFT JOIN obs e6
                            ON e6.person_id = o.person_id AND e6.encounter_id = o.encounter_id AND e6.concept_id = 56
                            LEFT JOIN obs e7
                            ON e7.person_id = o.person_id AND e7.encounter_id = o.encounter_id AND e7.concept_id = 57
                            LEFT JOIN obs e8
                            ON e8.person_id = o.person_id AND e8.encounter_id = o.encounter_id AND e8.concept_id = 58
                            LEFT JOIN obs e9
                            ON e9.person_id = o.person_id AND e9.encounter_id = o.encounter_id AND e9.concept_id = 59

 * */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS clinic_registration");
        DB::statement("DROP VIEW IF EXISTS visit_outcome_event");

        Schema::dropIfExists('obs');
    }
}
