import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { RecommendationService } from 'src/app/services/recommendation/recommendation.service';

@Component({
  selector: 'app-create-recommendation',
  templateUrl: './create-recommendation.component.html',
  styleUrls: ['./create-recommendation.component.css']
})
export class CreateRecommendationComponent implements OnInit {

  recommendation: any

  constructor(private recommendationService: RecommendationService, private router: Router) { }


  ngOnInit(): void {
    this.showRecommendations()
  }

  showRecommendations(){
    this.recommendation = this.recommendationService.listRecommendations().subscribe( recommendation => {
      this.recommendation = recommendation
      console.log(this.recommendation)
    })
  }

  createRecommendation(recommendationName: string, recommendationCpf: string, recommendationTelephone: string, recommendationEmail: string){
    this.recommendation = {
      'name': recommendationName,
      'cpf': recommendationCpf,
      'telephone': recommendationTelephone,
      'email': recommendationEmail
    }
    this.recommendationService.storeRecommendation(this.recommendation).subscribe( recommendation => {
      this.recommendation = recommendation
    })
    this.router.navigateByUrl("/")
    this.showRecommendations()
  }
}
