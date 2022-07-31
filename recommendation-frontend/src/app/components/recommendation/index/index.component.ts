import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { RecommendationService } from 'src/app/services/recommendation/recommendation.service';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {

  recommendations: any

  constructor(private recommendationService: RecommendationService, private router: Router) { }


  ngOnInit(): void {
    this.showRecommendations();
  }

  showRecommendations(){
    this.recommendations = this.recommendationService.listRecommendations().subscribe( recommendation => {
      this.recommendations = recommendation
      console.log(this.recommendations)
    })
  }

  deleteRecommendation(id: number){
    this.recommendationService.destroyRecommendation(id).subscribe( () => {
      this.recommendations = this.recommendations.filter((recommendation: any) => recommendation.id == id)
      this.router.navigateByUrl('/index')
      this.showRecommendations()
    })
  }

  evolutionRecommendation(id: number){
    this.recommendationService.updateRecommendation(id).subscribe( recomendation => {
      this.recommendations = recomendation
      this.router.navigateByUrl('/index')
      this.showRecommendations()
    })
  }
}
