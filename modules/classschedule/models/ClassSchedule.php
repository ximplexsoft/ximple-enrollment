<?php

namespace app\modules\classschedule\models;

use Yii;

/**
 * This is the model class for table "class_schedule".
 *
 * @property integer $class_schedule_id
 * @property integer $subject_id
 * @property integer $school_year_id
 * @property integer $semester_id
 * @property integer $professor_id
 * @property string $start_time
 * @property string $end_time
 * @property integer $sun
 * @property integer $mon
 * @property integer $tue
 * @property integer $wed
 * @property integer $thu
 * @property integer $fri
 * @property integer $sat
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $section_id
 * @property integer $class_intake_limit
 * @property string $start_date
 * @property string $end_date
 *
 * @property Subjects $subject
 * @property SchoolYear $schoolYear
 * @property Semester $semester
 * @property EmpInfo $professor
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Section $section
 * @property StuGrades[] $stuGrades
 * @property StuSchedule[] $stuSchedules
 */
class ClassSchedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_schedule_id', 'subject_id', 'school_year_id', 'semester_id', 'professor_id', 'start_time', 'end_time', 'created_by', 'updated_by', 'section_id'], 'required'],
            [['class_schedule_id', 'subject_id', 'school_year_id', 'semester_id', 'professor_id', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'created_by', 'updated_by', 'section_id', 'class_intake_limit'], 'integer'],
            [['start_time', 'end_time', 'created_at', 'updated_at', 'start_date', 'end_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class_schedule_id' => Yii::t('app', 'Class Schedule'),
            'subject_id' => Yii::t('app', 'Subject'),
            'school_year_id' => Yii::t('app', 'School Year'),
            'semester_id' => Yii::t('app', 'Semester'),
            'professor_id' => Yii::t('app', 'Professor'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'sun' => Yii::t('app', 'Sun'),
            'mon' => Yii::t('app', 'Mon'),
            'tue' => Yii::t('app', 'Tue'),
            'wed' => Yii::t('app', 'Wed'),
            'thu' => Yii::t('app', 'Thu'),
            'fri' => Yii::t('app', 'Fri'),
            'sat' => Yii::t('app', 'Sat'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'section_id' => Yii::t('app', 'Section'),
            'class_intake_limit' => Yii::t('app', 'Class Intake Limit'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::className(), ['subject_id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolYear()
    {
        return $this->hasOne(SchoolYear::className(), ['school_year_id' => 'school_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemester()
    {
        return $this->hasOne(Semester::className(), ['semester_id' => 'semester_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(EmpInfo::className(), ['emp_info_id' => 'professor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::className(), ['section_id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuGrades()
    {
        return $this->hasMany(StuGrades::className(), ['class_schedule_id' => 'class_schedule_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuSchedules()
    {
        return $this->hasMany(StuSchedule::className(), ['class_schedule_id' => 'class_schedule_id']);
    }
}
