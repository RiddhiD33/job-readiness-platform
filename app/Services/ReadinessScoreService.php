<?php

namespace App\Services;

use App\Models\User;
// use App\Models\CareerPath;


class ReadinessScoreService
{

    private const PROJECT_BASE_POINTS = 10;
    private const PROJECT_GITHUB_POINTS = 3;
    private const PROJECT_DEMO_POINTS = 2;
    private const PROJECT_SKILL_MATCH_POINTS = 5;
    private const INTERNSHIP_BASE_SCORE = 10;
    private const INTERNSHIP_CERTIFICATE_SCORE = 5;
    private const INTERNSHIP_SKILL_MATCH_SCORE = 5;
    private const PROFILE_PHONE_SCORE = 10;
    private const PROFILE_CITY_SCORE = 10;
    private const PROFILE_CAREER_PATH_SCORE = 10;
    private const PROFILE_CGPA_SCORE = 20;
    private const PROFILE_RESUME_SCORE = 25;
    private const PROFILE_PORTFOLIO_SCORE = 25;
    private const ASSESSMENT_WEIGHT = 0.40;
    private const PROJECT_WEIGHT = 0.25;
    private const INTERNSHIP_WEIGHT = 0.25;
    private const PROFILE_WEIGHT = 0.10;

    public function recalculate(User $user):float{
        $profile = $user->studentProfile;

        if(!$profile){
            return 0;
        }

        $finalScore = $this->calculateFinalScore($user);

        $profile->update(['readiness_score' => $finalScore,]);

        return $finalScore;
    }
public function calculateAssessmentScore(User $user): float
{
    $profile = $user->studentProfile;

    if (!$profile || !$profile->career_path_id) {
        return 0;
    }

    $latestAttempts = $profile->assessmentAttempts()
        ->whereHas('assessment', function ($query) use ($profile) {
            $query->where('career_path_id', $profile->career_path_id);
        })
        ->latest('id')
        ->get()
        ->unique('assessment_id');

    return round($latestAttempts->avg('score') ?? 0, 2);
}
public function calculateProjectScore(User $user): float
    {
        $profile = $user->studentProfile;

        if (!$profile || !$profile->careerPath) {
            return 0;
        }

        $careerSkillIds = $profile->careerPath
            ->skills()
            ->pluck('skills.id');

        $careerSkillCount = $careerSkillIds->count();

        if ($careerSkillCount === 0) {
            return 0;
        }

        $projects = $profile->projects()
            ->where('status', 'published')
            ->with('skills')
            ->get();

        $totalPoints = 0;

        foreach ($projects as $project) {

            $points = self::PROJECT_BASE_POINTS;

            if (!empty($project->github_link)) {
                $points += self::PROJECT_GITHUB_POINTS;
            }

            if (!empty($project->demo_link)) {
                $points += self::PROJECT_DEMO_POINTS;
            }

            $projectSkillIds = $project->skills
                ->pluck('id');

            $matchedSkills = $projectSkillIds
                ->intersect($careerSkillIds)
                ->count();

            $skillScore = round(
                ($matchedSkills / $careerSkillCount) * self::PROJECT_SKILL_MATCH_POINTS,
                2
            );

            $points += $skillScore;

            $totalPoints += $points;
        }

        return min(round($totalPoints, 2), 100);
    }
  public function calculateInternshipScore(User $user): float
{
    $profile = $user->studentProfile;

    if (!$profile || !$profile->careerPath) {
        return 0;
    }

    $careerSkillIds = $profile->careerPath
        ->skills()
        ->pluck('skills.id');

    $careerSkillCount = $careerSkillIds->count();

    if ($careerSkillCount === 0) {
        return 0;
    }

    $internships = $profile->internships()
        ->where('status', 'published')
        ->with('skills')
        ->get();

    $totalPoints = 0;

    foreach ($internships as $internship) {

        $points = self::INTERNSHIP_BASE_SCORE;

        if (!empty($internship->certificate_url)) {
            $points += self::INTERNSHIP_CERTIFICATE_SCORE;
        }

        $internshipSkillIds = $internship->skills->pluck('id');

        $matchedSkills = $internshipSkillIds
            ->intersect($careerSkillIds)
            ->count();

        $skillScore = round(
            ($matchedSkills / $careerSkillCount) * self::INTERNSHIP_SKILL_MATCH_SCORE,
            2
        );

        $points += $skillScore;

        $totalPoints += $points;
    }

    return min(round($totalPoints, 2), 100);
}

    public function calculateProfileScore(User $user):float{
       $profile = $user -> studentProfile;

       if(!$profile){
        return 0;
        }

        $score =0;

        if(!empty($profile->phone)){
            $score += self::PROFILE_PHONE_SCORE;
        }

        if(!empty($profile->current_city)){
            $score += self::PROFILE_CITY_SCORE;
        }

        if(!empty($profile->career_path_id)){
            $score += self::PROFILE_CAREER_PATH_SCORE ;
        }

        if (!is_null($profile->cgpa)){
            $score += self::PROFILE_CGPA_SCORE;
        }

        if(!empty($profile->resume_url)){
            $score += self::PROFILE_RESUME_SCORE;
        }

        if(!empty($profile->portfolio_url)){
            $score += self::PROFILE_PORTFOLIO_SCORE;
        }

        return $score;
       }
    

    public function calculateFinalScore(User $user):float{
        $assessmentScore = $this->calculateAssessmentScore($user);
        $projectScore = $this->calculateProjectScore($user);
        $internshipScore = $this->calculateInternshipScore($user);
        $profileScore = $this->calculateProfileScore($user);

        $finalScore = ($assessmentScore * self::ASSESSMENT_WEIGHT)+($projectScore * self::PROJECT_WEIGHT ) + ($internshipScore * self::INTERNSHIP_WEIGHT) + ($profileScore * self::PROFILE_WEIGHT);

        return round($finalScore,2);
    }
      
}


