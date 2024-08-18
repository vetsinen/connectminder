select salesman.Id, customer.Id from salesman join customer on salesman.Id = customer.Salesman_id where salesman.commision>0.12 AND salesman.commision<0.14;

select distinct salesman.Name, customer.Id from salesman left join customer on salesman.Id = customer.Salesman_id where customer.Id is NULL;