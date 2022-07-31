import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CreateRecommendationComponent } from './components/recommendation/create-recommendation/create-recommendation.component';
import { IndexComponent } from './components/recommendation/index/index.component';

const routes: Routes = [
  {
    path: "", redirectTo: "/index", pathMatch: "full"
  },
  {
    path: "index", component: IndexComponent
  },
  {
    path: "createRecommendation", component: CreateRecommendationComponent
  },
  {
    path: "**", redirectTo: "/not-found"
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
