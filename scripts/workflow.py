import MySQLdb
from datetime import datetime, timedelta
from airflow import DAG
from airflow.hooks.sqlite_hook import SqliteHook
from airflow.operators.python_operator import PythonOperator
from airflow.exceptions import AirflowException
from airflow.operators.sensors import ExternalTaskSensor 
from airflow.operators.bash_operator import BashOperator 
from airflow.operators.email_operator import  EmailOperator
from airflow.operators import PythonOperator, BashOperator
import airflow.models as af_models 
import airflow.operators as af_op
import json
import os, sys
from urllib.request import urlopen
import ast
import MySQLdb
import optparse

import peewee
from peewee import *
from peewee import fn


from ConfigParser import SafeConfigParser
_cfg = SafeConfigParser()
_cfg.read('airflow.cfg')

##writing models###


sql_db = peewee.PostgresqlDatabase('mydb',user='dcube',password='Dcube2017', port = '5439', \
host='dcubeddsplatform-target.cbhavf18spr7.us-west-1.redshift.amazonaws.com')


class MySQLModel(peewee.Model):
    class Meta:
        database = sql_db

class dcube_prescrx_selection1rule1(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    state = peewee.CharField()

    years = peewee.CharField()

    NRxCount = peewee.CharField()

class dcube_prescrx_selection1rule2(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    state = peewee.CharField()

    years = peewee.CharField()

    TRxCount = peewee.CharField()



class dcube_prescrx_selection2rule1(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    market_id_1 = peewee.CharField()

    market_name_1 = peewee.CharField()

    city = peewee.CharField()

    months = peewee.CharField()

    years = peewee.CharField()

    NRxCount = peewee.CharField()
class dcube_prescrx_selection2rule2(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    market_id_1 = peewee.CharField()

    market_name_1 = peewee.CharField()

    city = peewee.CharField()

    months = peewee.CharField()

    years = peewee.CharField()

    TRxCount = peewee.CharField()

class dcube_prescrx_selection3rule1(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    state = peewee.CharField()

    city = peewee.CharField()

    years = peewee.CharField()

    NRxCount = peewee.CharField()

class dcube_prescrx_selection3rule2(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    state = peewee.CharField()

    city = peewee.CharField()

    years = peewee.CharField()

    TRxCount = peewee.CharField()

class aggregating_rule_table(MySQLModel):
    rule_id = peewee.CharField()
    rule_name = peewee.CharField()
    rule_type = peewee.CharField()
    rule_orm = peewee.CharField(max_length=3000)
    version = peewee.CharField()
    status = peewee.CharField()

class dcube_prescrx_prescriberlevel(MySQLModel):
    plan_id = peewee.CharField()
    rel_id = peewee.CharField()
    writer_type = peewee.CharField()
    week_ending_date = peewee.CharField(null=True)
    month_ending_date = peewee.CharField()
    new_rx_count = peewee.CharField()
    refill_rx_count = peewee.CharField()
    total_rx_count = peewee.CharField()
    new_rx_quantity = peewee.CharField()
    refill_rx_quantity = peewee.CharField()
    total_rx_quantity = peewee.CharField()
    new_days_supply = peewee.CharField()
    refill_days_supply = peewee.CharField()
    total_days_supply = peewee.CharField()
    market_id_1 = peewee.CharField()
    market_name_1 = peewee.CharField()
    market_id_2 = peewee.CharField()
    market_name_2 = peewee.CharField()
    product_id = peewee.CharField()
    product_name = peewee.CharField()
    state = peewee.CharField()
    city = peewee.CharField()
    zip_code = peewee.CharField()






sql_db.connect()


dcube_prescrx_selection1rule1.create_table(True)
dcube_prescrx_selection1rule2.create_table(True)
dcube_prescrx_selection2rule1.create_table(True)
dcube_prescrx_selection2rule2.create_table(True)
dcube_prescrx_selection3rule1.create_table(True)
dcube_prescrx_selection3rule2.create_table(True)
dcube_prescrx_prescriberlevel.create_table(True)
aggregating_rule_table.create_table(True)


####writing Functions
####Ingestion
def Task1(**self):
    print("Extraction Started")
    print("Extraction Complete")
    #print("Dummy")

####Mapping Pres RX
def Task2_a(**self):
    sel_qry = '<class unusual_prefix_85e11f9bf1ea5f2c24264a2032129d2f186e19ff_workflow> SELECT "t1"."market_id_1", "t1"."market_id_2", "t1"."product_id", "t1"."plan_id", "t1"."data_type", "t1"."rel_id", "t1"."writer_type", "t1"."payment_type_ind", "t1"."week_ending_date", "t1"."month_ending_date", "t1"."sob_group","t1"."diagnosis_combo", "t1"."new_rx_count", "t1"."refill_rx_count", "t1"."total_rx_count", "t1"."new_rx_quantity", "t1"."refill_rx_quantity","t1"."total_rx_quantity", "t1"."new_days_supply", "t1"."refill_days_supply","t1"."total_days_supply" FROM "symphony_prescriber_rx" AS t1 [] '
    
    print sel_qry

    insert_qry =  ' INSERT INTO "dcube_prescriber_rx" ("market_id_1", "market_id_2", "product_id", "plan_id", "data_type", "rel_id", "writer_type", "payment_type_ind", "week_ending_date", "month_ending_date", "sob_group", "diagnosis_combo","new_rx_count", "refill_rx_count", "total_rx_count", "new_rx_quantity","refill_rx_quantity", "total_rx_quantity", "new_days_supply", "refill_days_supply","total_days_supply") SELECT "t2"."market_id_1", "t2"."market_id_2", "t2"."product_id", "t2"."plan_id", "t2"."data_type", "t2"."rel_id", "t2"."writer_type","t2"."payment_type_ind", "t2"."week_ending_date", "t2"."month_ending_date","t2"."sob_group", "t2"."diagnosis_combo", "t2"."new_rx_count","t2"."refill_rx_count", "t2"."total_rx_count", "t2"."new_rx_quantity","t2"."refill_rx_quantity", "t2"."total_rx_quantity", "t2"."new_days_supply","t2"."refill_days_supply", "t2"."total_days_supply" FROM "symphony_prescriber_rx" AS t2 [] '

    print insert_qry

####Mapping Prod dim
def Task2_b(**self):
    sel_qry = '<class unusual_prefix_85e11f9bf1ea5f2c24264a2032129d2f186e19ff_workflow >SELECT "t1"."market_id_1", "t1"."market_name_1", "t1"."market_id_2","t1"."market_name_2", "t1"."product_id", "t1"."product_name", "t1"."ndc","t1"."usc", "t1"."usc_description", "t1"."bb_usc", "t1"."bb_usc_description","t1"."drug_name", "t1"."generic_name", "t1"."form_code","t1"."form_description", "t1"."strength_description" FROM "symphony_prod_dim" AS t1 [] '

    print sel_qry

    insert_qry = ' INSERT INTO "dcube_prod_dim" ("market_id_1", "market_name_1","market_id_2", "market_name_2", "product_id", "product_name", "ndc", "usc", "usc_description", "bb_usc", "bb_usc_description", "drug_name", "generic_name","form_code", "form_description", "strength_description") SELECT "t2"."market_id_1", "t2"."market_name_1", "t2"."market_id_2","t2"."market_name_2", "t2"."product_id", "t2"."product_name", "t2"."ndc","t2"."usc", "t2"."usc_description", "t2"."bb_usc", "t2"."bb_usc_description","t2"."drug_name", "t2"."generic_name", "t2"."form_code", "t2"."form_description", "t2"."strength_description" FROM "symphony_prod_dim" AS t2 [] '

    print insert_qry

    

####Mapping Pres Dim
def Task2_c(**self):

    sel_qry =  '<class unusual_prefix_85e11f9bf1ea5f2c24264a2032129d2f186e19ff_workflow >SELECT "t1"."rel_id", "t1"."provider_id_number", "t1"."data_agent_code", "t1"."writer_type", "t1"."first_name", "t1"."middle_name", "t1"."last_name","t1"."title", "t1"."specialty_code", "t1"."specialty_desc", "t1"."address","t1"."city", "t1"."state", "t1"."zip_code", "t1"."ama_no_contact","t1"."ama_pdrp_indicator", "t1"."ama_pdrp_date", "t1"."presumed_dead_ind","t1"."type_of_practice_code", "t1"."npi", "t1"."territory_id","t1"."call_status_code" FROM "symphony_presc_dim" AS t1 [] '


    print sel_qry

    insert_qry = ' INSERT INTO "dcube_presc_dim" ("rel_id", "provider_id_number","data_agent_code", "writer_type", "first_name", "middle_name", "last_name","title", "specialty_code", "specialty_desc", "address", "city", "state", "zip_code","ama_no_contact", "ama_pdrp_indicator", "ama_pdrp_date","presumed_dead_ind", "type_of_practice_code", "npi", "territory_id","call_status_code") SELECT "t2"."rel_id", "t2"."provider_id_number","t2"."data_agent_code", "t2"."writer_type", "t2"."first_name","t2"."middle_name", "t2"."last_name", "t2"."title", "t2"."specialty_code","t2"."specialty_desc", "t2"."address", "t2"."city", "t2"."state", "t2"."zip_code","t2"."ama_no_contact", "t2"."ama_pdrp_indicator", "t2"."ama_pdrp_date","t2"."presumed_dead_ind", "t2"."type_of_practice_code", "t2"."npi","t2"."territory_id", "t2"."call_status_code" FROM "symphony_presc_dim" AS t2 [] '

    print insert_qry

####Standard Dcube Library
def Task3(**self):
    print("Dummy")

####KPI 1
def Task4(**self):
    print("Dummy")

####Dcube Prescriber Rx
def Task4_t_1(**self):
    print("Dummy")

####Dcube Product Dimension
def Task4_t_2(**self):
    print("Dummy")

####Dcube Prescriber Drug Level-Merging
def Task4_m(**self):
    print("Dummy")

####Dcube Prescriber Aggregating at state level
def Task4_ag(**self):
    print("Dummy")

#####
####KPI 2
def Task5(**self):
    print("Dummy")

####Dcube Prescriber Rx
def Task5_t_1(**self):
    print("Dummy")

####Dcube Product Dimension
def Task5_t_2(**self):
    print("Dummy")

####Dcube Prescriber  Dimension
def Task5_t_3(**self):
    print("Dummy")

####Dcube Prescriber Drug Level-Merging
def Task5_m_1(**self):
    print("Dummy")

####Dcube Prescriber Aggregating at state level
def Task5_ag(**self):
    print("Dummy")


def get_orm_query(rule_name):
    conn = MySQLdb.connect(db='ddsplatform', user='root', passwd='laravel', charset="utf8")
    cursor = conn.cursor()
    query = 'select rule_orm from aggregating_rule_table where rule_name = "%s"' % rule_name
    rule_orm = cursor.execute(query)
    row = cursor.fetchall()
    if row:
        row = row[0][0]
    #rule_or = eval(row)
    print row
    cursor.close()
    conn.close()
    #return row




def get_query(rule_name):
    conn = MySQLdb.connect(db='ddsplatform', user='root', passwd='laravel', charset="utf8")
    cursor = conn.cursor()
    qry = 'select query_field from aggregating_rule_table where rule_name = "%s"' % rule_name

    qry_ru = cursor.execute(qry)
    row = cursor.fetchall()
    if row:
        row = row[0][0]
    rules= eval(row)
    print rules
    cursor.close()
    conn.close()


default_args = {
    'depends_on_past': False,
    'retries': 1,
    'retry_delay': timedelta(minutes=1),
    'dagrun_timeout': timedelta(minutes=1),
    'email' : ['swetha@headrun.com'],
    'email_on_failure': True,
    'email_on_retry': True
}
def get_mysql_conn(db, user, passwd):
    conn = MySQLdb.connect(db=db, user=user, passwd=passwd, charset="utf8")
    cur = conn.cursor()

    return conn, cur

def close_mysql_conn(conn, cur):
    cur.close()
    conn.close()

def get_dynim_dag_list(**self):
   
    conn, cur = get_mysql_conn(db='dds_new', user='root', passwd = 'laravel')
    query = 'select id,kpi,sub_kpi,dimension,project_name,created_at from  kpi_selection_info'
    cur.execute(query)
    rows = cur.fetchall()

    close_mysql_conn(conn, cur)

    listofdags = []
    for row in rows:
        pid,kpi,sub_kpi,dimension,project_name,created_at = row

        dag_name = (str(pid)+'_'+project_name ).replace(' ', '_').replace('&', '_').replace('(', '').replace(')', '').rstrip('_')

        dag_name = dag_name.replace('[','').replace('\"','').replace(']','').replace(',','_').replace('$','')

        dag = af_models.DAG(dag_id=dag_name, start_date = created_at, schedule_interval='10 4 * * *', default_args=default_args)
        kpis = ast.literal_eval(kpi)
        dimensions = ast.literal_eval(dimension)
        sub_ki = ast.literal_eval(sub_kpi)
        task1 = af_op.PythonOperator(task_id='Data_Extraction_Into_Dcube_Environment',
                                      provide_context=True,
                                      python_callable=Task1, dag=dag)
        print task1
        task2_a = af_op.PythonOperator(task_id='Mapping_Prescriber_Rx',
                                  provide_context=True,
                                  python_callable=Task2_a, dag=dag)
        task2_b = af_op.PythonOperator(task_id='Mapping_Product_Dimension',
                                  provide_context=True,
                                 python_callable=Task2_b, dag=dag)
        task2_c = af_op.PythonOperator(task_id='Mapping_Prescriber_Dimension',
                                  provide_context=True,
                                  python_callable=Task2_c, dag=dag)

        task3 = af_op.PythonOperator(task_id='Dcube_Standard_Library',
                                  provide_context=True,
                                  python_callable=Task3, dag=dag)
        ####Setting Upstream
        task2_a.set_upstream(task1)
        task2_b.set_upstream(task1)
        task2_c.set_upstream(task1)
        task3.set_upstream(task2_a)
        task3.set_upstream(task2_b)
        task3.set_upstream(task2_c)
        for kpi in kpis:
            for su in sub_ki:
                if 'State' in dimensions and 'City' in dimensions and 'Absolute Volume' in su:
                #if 'State' in dimensions and 'City' in dimensions and su == 'Absolute Volume':
                    rule_name = kpi + '_' + su.replace(' ', '_') + '_with_dim'
                else:
                    rule_name = kpi + '_' + su.replace(' ', '_')
                if rule_name:
                    orm_rule = get_orm_query(rule_name)    
                    query_rule = get_query(rule_name)
            task4 = af_op.BashOperator(task_id = rule_name,\
                                        provide_context=True, \
                                        bash_command='python /root/sindhu/dds/selecting_nrx_trx.py -n "%s" ' % rule_name,\
                                        dag=dag)
            task4_t_1 = af_op.PythonOperator(task_id='dcube_prescriber_rx_' + kpi,
                                      provide_context=True,
                                     python_callable=Task4_t_1, dag=dag)
            task4_t_2 = af_op.PythonOperator(task_id='dcube_prod_dim_' + kpi,
                                      provide_context=True,
                                      python_callable=Task4_t_2, dag=dag)
            task4_m = af_op.PythonOperator(task_id='dcube_presc_drug_level-merging_' + kpi,
                                      provide_context=True,
                                      python_callable=Task4_m, dag=dag)
            task_name = 'Aggregating_' + rule_name +'_' + '_At_' + kpi + '_level'


            task4_ag = af_op.PythonOperator(task_id = task_name,
                                      provide_context=True,
                                     python_callable=Task4_ag, dag=dag)

            ####KPI 1
            task4.set_upstream(task3)
            task4_t_1.set_upstream(task4)
            task4_t_2.set_upstream(task4)
            task4_m.set_upstream(task4_t_1)
            task4_m.set_upstream(task4_t_2)
            task4_ag.set_upstream(task4_m)
            listofdags.append(dag)

    return listofdags
